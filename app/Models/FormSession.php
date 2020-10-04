<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSession extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_token', 'ip_address'
    ];

    public function PersonalInputs() {
        return $this->hasOne('App\Models\PersonalInput');
    }

    public function AddressInputs() {
        return $this->hasOne('App\Models\AddressInput');
    }

    public function ContactInputs() {
        return $this->hasOne('App\Models\ContactInput');
    }
}
