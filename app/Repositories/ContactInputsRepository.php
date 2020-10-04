<?php

namespace App\Repositories;

use App\Models\ContactInput;
use Illuminate\Support\Facades\DB;

class ContactInputsRepository
{
    private $contactInput;
    private $model;
    
    public function __construct(ContactInput $contactInput)
    {
        $this->contactInput = $contactInput;
    }


    public function store($inputs)
    {
        return $this->contactInput->create($inputs);
    }

    public function update(ContactInput $model, $inputs)
    {
        $model->fill($inputs)->save();
        return $model;
    }

    public function save($inputs, $formSession)
    {
        $inputs['items']['form_session_id'] = $formSession->id;

        $this->model = $formSession->contactInputs;

        if($this->model) {
            return $this->update($this->model, $inputs['items']);
        } else {
            return $this->store($inputs['items']);
        }
    }
}
