<?php

namespace App\Traits;

trait Utilities
{
    public function introduce()
    {
        return "Hello, my name is .....";
    }

    public function getFullName($fName, $lName)
    {
        return "$fName $lName";
    }
}

