<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PHPLessioncontroller extends Controller
{
    public function variables()
    {
        $breakLine = "<br>------------------------------<br>";

        $num1 = 10;
        $num2 = 20;
        $NUM1 = 20;
        $name = 'naing oo';
        $amount = 10.345;
        $isActive = true;
        $numArray = [1, 2, 3];
        $strArray = ['apple', 'orange', 'banana'];
        $anyArray = ['apple', 20, 30.567];
        $obj = [
            'name' => 'banana',
            'price' => 30.55,
            'qty' => 20
        ];

        echo "{$num1} & {$NUM1}";

        echo $breakLine;

        echo $num1 + $num2;

        echo $breakLine;

        echo '12345';

        echo $breakLine;

        var_dump($num1);

        echo $breakLine;

        var_dump($name);

        echo $breakLine;

        var_dump($amount);

        echo $breakLine;

        var_dump($isActive);
        var_dump(!$isActive);

        echo $breakLine;

        var_dump($numArray);

        echo $breakLine;

        var_dump($strArray);

        echo $breakLine;

        var_dump($anyArray);

        echo $breakLine;

        var_dump($obj);
    }
}
