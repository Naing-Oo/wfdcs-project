<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModal extends Model
{
    use HasFactory;

    protected function getFullNameAttribute() // attribute, method
    {
        return "AUNG NAING OO";
    }

    protected function getPhoneAttribute() // attribute, method
    {
        return '0986948341';
    }

    
}
