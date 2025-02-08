<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

// dependency injection

class PHPLessioncontroller extends Controller
{
    /**
     * variable
     */
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


    /**
     * string
     */
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

        echo $br;
        echo strtoupper($x);
        echo $br;
        echo strtolower($x);
        echo $br;
        echo str_replace('Naing', 'Ko', $x);
        echo $br;
        echo strrev($x);

        $x = "Bangkok      ";
        $y = "Singapore";
        echo $br;
        echo trim($x) . $y;

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
        echo $br;
        echo "Day $dateArr[0]";
        echo $br;
        echo "Month $dateArr[1]";
        echo $br;
        echo "Year $dateArr[2]";

        $full_name = "MG GAYWAH";
        $full_name = "SAW AUNG NAINGOO"; // 14 - 2 = 12

        $first_name = explode(' ', $full_name)[0];
        // $last_name = substr($full_name, strlen($first_name), strlen($full_name) - strlen($first_name));
        // $last_name = substr($full_name, strlen($first_name));

        $last_name = substr($full_name, -7, 5);
        // $last_name = substr($full_name, strlen($full_name) - 2, 2);

        echo "$br First Name = $first_name $br Last Name = $last_name";

        $first_name = substr($full_name, 0, 3);
        $last_name = substr($full_name, 4, strlen($full_name));

        // echo "$br First Name = $first_name $br Last Name = $last_name";

        $message = 'I don\'t know';
        $message = "We are the so-called \"Vikings\" from the north.";
        echo "$br $message";
    }


    /**
     * operator
     */
    public function operator()
    {
        $br = '<br>';
        $x = array('red', 'yellow', 'blue');
        $y = array('green', 'gray', 'white');

        $z = array_merge($x, $y);

        print_r($z);

        // Conditional Assignment Operators
        $num1 = 10;
        $num2 = 20;
        $maxNum = 0;

        if ($num1 > $num2 && $num1 > 0 || $num1 < 30) {
            $maxNum = $num1;
        } else if ($num1 < $num2) {
            // 
        } else {
            $maxNum = $num2;
        }

        $maxNum = $num1 > $num2 ? $num1 : $num2;

        echo "$br $maxNum";

        $address = null;

        echo $br;
        echo $address ?? "Not found";

        $currency = 'THB';

        // switch ($currency) {
        //     case 'THB':
        //     case 'บาท':
        //         return "Thai Bath";
        //         break;
        //     case 'USD':
        //         # code...
        //         break;
        //     case 'JPY':
        //         # code...
        //         break;
        //     case 'CHY':
        //         # code...
        //         break;
        //     case 'SGD':
        //         # code...
        //         break;
        //     case 'MMK':
        //         # code...
        //         break;
        //     case 'MLR':
        //         # code...
        //         break;
        //     default:
        //         # code...
        //         break;
        // }

    }


    /**
     * loop
     * for, foreach, while, do while
     */
    public function loops()
    {
        $br = '<br>';

        for ($i = 0; $i < 10; $i++) {
            print_r($i);
        }

        echo $br;

        // $colors = array("red", "green", "blue", "yellow");
        $colors = ["red", "green", "blue", "yellow"];

        foreach ($colors as $key => $value) {
            echo "$key - $value  ";
        }

        $students = [
            'name' => 'Naing Oo',
            'phone' => '0986948341',
            'email' => 'naingoo123448@gmail.com',
            'address' => 'Bangkok',
        ];

        echo $br;

        foreach ($students as $index => $student) {
            echo "$index - $student  ";
        }

        $product = new Product(); // clone

        $product->id = 1;
        $product->code = '0001';
        $product->name = 'apple';

        echo $br;
        echo $br;

        echo $product; // object

        $proArr = $product->toArray(); // convert to array
        echo $br;
        echo $br;
        print_r($proArr); // print array

        echo $br;
        echo $br;
        foreach ($proArr as $x => $y) { // print loop result
            echo "$x: $y<br>";
        }

        $product->id = 2;
        $product->code = '0002';
        $product->name = 'orange';

        echo $br;
        echo $br;
        foreach ($product->toArray() as $x => $y) { // print loop result
            echo "$x: $y<br>";
        }

        /**
         * break & continue
         */
        echo $br;
        echo $br;
        foreach ($colors as $key => $value) {
            if ($value === 'blue') {
                break;
            }

            echo "$value <br>";
        }

        echo $br;
        echo $br;
        foreach ($colors as $key => $value) {
            echo "$value <br>";
            if ($value === 'blue') break;
        }

        echo $br;
        echo $br;
        foreach ($colors as $key => $value) {
            if ($value === 'blue') continue;
            echo "$value <br>";
        }

        echo $br;
        echo $br;
        foreach ($colors as $key => $value) {
            if ($value == 'blue') {
                $value = 'pink';
            }
        }
        print_r($colors);

        echo $br;
        echo $br;
        foreach ($colors as $key => &$value) {
            if ($value == 'blue') {
                $value = 'pink';
            }
        }
        print_r($colors);











        echo $br;
        echo $br;


    }
}
