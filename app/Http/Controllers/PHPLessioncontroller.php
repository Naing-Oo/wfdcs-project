<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PHPLessioncontroller extends Controller
{
    public function variables()
    {
        $breakLine = "<br>------------------------------<br>";

        $char = 'A'; // char
        $num1 = 10;
        $num2 = 20;
        $NUM1 = 20; // integer, int, int32, int16, bigInteger
        $name = 'naing oo'; // string, text, varchar, nvarchar
        $amount = 10.345; // float, double, decimal
        $isActive = true; // bool, boolean, tinyint, bit
        $numArray = [1, 2, 3]; // array, int[]
        $strArray = ['apple', 'orange', 'banana']; // string[]
        $anyArray = ['apple', 20, 30.567]; // any[]
        $obj = [ // obj, object, [key => value], {}
            'name' => 'banana',
            'price' => 30.55,
            'qty' => 20
        ];

        $x = 0; // integer
        $y = 1.5; // float
        $z = ""; // string

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

        echo $breakLine;
        // Assign Multiple Values
        $x = $y = $z = "Fruit";

        var_dump($x, $y, $z);
    }

    public function strings()
    {
        $br = '<br>';
        $x = "Saw Naing Oo"; // string

        echo "Hello " . $x;

        echo $br;
        echo "Hello $x";

        echo $br;
        echo "Hello {$x}";

        echo $br;
        echo 'Hello {$x}'; // can not

        echo $br;
        echo "<h4>String Length</h4>";
        echo "<p>return the length of string</p>";
        echo strlen($x);
        echo $br;
        echo str_word_count($x);
        echo $br;
        echo strpos($x, 'Naing');

        echo $br; echo strtoupper($x);
        echo $br; echo strtolower($x);
        echo $br; echo str_replace('Naing', 'Ko', $x);
        echo $br; echo strrev($x);

        $x = "Bangkok      ";
        $y = "Singapore";
        echo $br; echo trim($x). $y;
        
        $y = "Apple,Banana,Coconut";

        $z = explode(',', $y);

        echo $br;
        echo $z[0];
        echo $br;
        echo $z[1];
        echo $br;
        echo $z[2];

        echo $br;
        $date = "01/02/2025";
        $dateArr = explode('/', $date);
        echo $br; echo "Day $dateArr[0]";
        echo $br; echo "Month $dateArr[1]";
        echo $br; echo "Year $dateArr[2]";

        $full_name = "SAW GAY WAH";
        $full_name = "SAW AUNG NAING OO";
        
        $first_name = substr($full_name, 0, 3);
        $last_name = substr($full_name, 4, strlen($full_name));

        echo "$br First Name = $first_name $br Last Name = $last_name";
        
        
    }




}
