<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\FormSession;
use App\Repositories\PersonalInputsRepository;
use App\Repositories\AddressInputsRepository;
use App\Repositories\ContactInputsRepository;

class FormSessionController extends Controller
{
    private $formSession;
    private $ipAddress;
    private $personalInputsRepository;
    private $addressInputsRepository;
    private $contactInputsRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(
        PersonalInputsRepository $personalInputsRepository,
        AddressInputsRepository $addressInputsRepository,
        ContactInputsRepository $contactInputsRepository
    ) {
        $this->personalInputsRepository = $personalInputsRepository;
        $this->addressInputsRepository = $addressInputsRepository;
        $this->contactInputsRepository = $contactInputsRepository;
    }

    public function index(Request $request)
    {
        $haveCookie = $request->cookie('form_token');
        if($haveCookie) {
            $formSession = $this->findSession($request);
            if($formSession) {
                $personalInputs = $formSession->personalInputs;
                $addressInputs = $formSession->addressInputs;
                $contactInputs = $formSession->contactInputs;
                return view('form', compact('personalInputs', 'addressInputs', 'contactInputs'));
            }

        }

        return $this->store($request);
    }

    public function store(Request $request)
    {
        $success = true;
        \DB::beginTransaction();

        try {
            $formToken = Str::random(40);
            $inputs = [ 'form_token' => $formToken,  'ip_address' => $request->ip() ];
            $response = FormSession::create($inputs);
            $week = 420;
            $cookie = cookie('form_token', $formToken, $week);
            
            \DB::commit();

            return response()->view('form')->cookie($cookie);
        } catch (\Throwable $th) {

            echo $th;
        }

    }

    public function findSession(Request $request) {
        $ipAddress = $request->ip();
        $formToken = $request->cookie('form_token');

        return FormSession::where('ip_address', $ipAddress)->where('form_token', $formToken)->first();
    }

    public function saveData(Request $request) {
        $payload = $request->all();

        $formSession = $this->findSession($request);

        $success = $this->save($payload, $formSession);

        return Response()->json([
            'success' => $success
        ], $success ? 200 : 400);
    }

    private function save($payload, $formSession) {
        switch ($payload['type']) {
            case 'personal':
                return $this->personalInputsRepository->save($payload, $formSession);
            break;
            
            case 'address':
                return $this->addressInputsRepository->save($payload, $formSession);
            break;

            case 'contact':
                return $this->contactInputsRepository->save($payload, $formSession);
            break;
        }
    }

    public function complete(Request $request) {
        try {
            $success = true;
            $session = $this->findSession($request);
            $session->delete();
        } catch (\Throwable $th) {
            $success = false;
        }

        return Response()->json([
            'success' => $success
        ], $success ? 200 : 400);
    }
}
