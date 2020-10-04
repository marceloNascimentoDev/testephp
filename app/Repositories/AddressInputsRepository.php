<?php

namespace App\Repositories;

use App\Models\AddressInput;
use Illuminate\Support\Facades\DB;

class AddressInputsRepository
{
    private $addressInput;
    private $model;
    
    public function __construct(AddressInput $addressInput)
    {
        $this->addressInput = $addressInput;
    }

    public function destroy($id)
    {
        $pets = $this->pets->findOrfail($id);

        return $pets->delete();
    }

    public function store($inputs)
    {
        return $this->addressInput->create($inputs);
    }

    public function update(AddressInput $model, $inputs)
    {
        $model->fill($inputs)->save();
        return $model;
    }

    public function save($inputs, $formSession)
    {
        $inputs['items']['form_session_id'] = $formSession->id;

        $this->model = $formSession->addressInputs;

        if($this->model) {
            return $this->update($this->model, $inputs['items']);
        } else {
            return $this->store($inputs['items']);
        }
    }
}
