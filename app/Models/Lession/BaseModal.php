<?php

namespace App\Models\Lession;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModal extends Model
{
    use HasFactory;

    public function __construct()
    {
        parent::__construct();
    }

    protected function getFullNameAttribute() // attribute, method
    {
        return "AUNG NAING OO";
    }

    protected function getPhoneAttribute() // attribute, method
    {
        return '0986948341';
    }

    protected function returnMessage($category, $qty): string
    {
        // return "The qty of {$category} is {$qty}";
        return self::MESSAGE;
    }

    public function intro($name, $qty)
    {
        return "The name is {$name} and the qty is {$qty}.";
    }

    const MESSAGE = "Thank you for visiting W3Schools.com!";
}
