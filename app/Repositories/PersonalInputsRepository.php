<?php

namespace App\Repositories;

use App\Models\PersonalInput;
use Illuminate\Support\Facades\DB;

class PersonalInputsRepository
{
    private $personalInput;
    private $model;
    
    public function __construct(PersonalInput $personalInput)
    {
        $this->personalInput = $personalInput;
    }

    public function store($inputs)
    {
        return $this->personalInput->create($inputs);
    }

    public function update(PersonalInput $model, $inputs)
    {
        return $model->fill($inputs)->save();
    }

    public function save($inputs, $formSession)
    {
        $inputs['items']['form_session_id'] = $formSession->id;

        $this->model = $formSession->personalInputs;

        if($this->model) {
            return $this->update($this->model, $inputs['items']);
        } else {
            return $this->store($inputs['items']);
        }
    }
}
