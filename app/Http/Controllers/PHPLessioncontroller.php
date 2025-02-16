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

        echo "$br$br";
        $a = 1;
        while ($a <= 10) {
            echo "$a <br>";
            $a++;
        }

        echo "$br$br";
        $a = 0;
        while ($a < 10) {
            $a++;
            if ($a === 5) break;
            echo "$a <br>";
        }

        $a = 0;
        echo "$br$br";
        while ($a < 10) {
            $a++;
            if ($a == 5) continue;
            echo "$a <br>";
        }

        $a = 0;
        echo "$br$br";
        while ($a < 100) {
            $a += 10;
            echo "$a <br>";
        }

        echo "$br$br";
        $a = 1;
        do {
            echo "$a <br>";
            $a++;
        } while ($a <= 10);

        echo "$br$br";

        $fruits = ['apple', 'orange', 'banana', 'coconut', 'paniapple'];
        $i = 0;
        do {
            echo "$fruits[$i] <br>";
            $i++;
        } while ($fruits[$i] !== 'coconut');


        echo "$br$br";

        $x = '10'; // string
        $y = 10; // integer

        if ($x == $y) {
            echo "true";
        } else {
            echo "false";
        }
        if ($x === $y) {
            echo "true";
        } else {
            echo "false";
        }


        echo $br;
        echo $br;
    }

    /**
     * functions
     */
    public function functions()
    {
        $lastName = 'AUNG NAING OO';
        $fullName = $this->fullName($lastName);

        echo "$lastName <br>";
        echo "$fullName <br>";

        $num = 2;
        $this->addFive($num);
        echo "$num <br>";

        $this->addFirstName($lastName);
        echo "$lastName <br>";

        // ===== 15/2/2025

        $arr = array(1, 2, 3, 4, 5, 6, 7);
        $result1 = $this->sumMyNumbersByArray($arr);
        $result2 = $this->sumMyNumbers(1, 2, 3, 4, 5, 6, 7);
        $result3 = $this->myFamily("SAW", "AUNG", "GAY", "WAH");

        echo "$result1 $result2 <br> $result3";

        $num1 = 10; // int
        $num2 = '10'; // string
        $total = $num1 + $num2;

        echo "<br>  $total";

        $total = $this->addNumber(5, 5);
        echo "<br>  $total";
    }

    /**
     * array
     */
    public function arrays()
    {
        // PHP array types
        // Indexed arrays - Arrays with a numeric index
        $fruit = ['apple', 'banana', 'orange', 'coconut'];
        $colors = array('red', 'green', 'white', 'black');

        echo "$fruit[0] <br>";
        echo "$fruit[1] <br>";
        echo "$fruit[2] <br>";
        echo "$fruit[3] <br>";

        echo "<br><br>";

        for ($i = 0; $i < count($colors); $i++) {
            echo "$colors[$i] <br>";
        }


        echo "<br><br>";

        // Associative arrays - Arrays with named keys
        $students = [
            'code' => '001',
            'name' => 'saw',
            'phone' => '09864221212',
            'email' => 'saw@gmail.com',
        ];

        echo $students['code'] . '<br>';
        echo $students['name'] . '<br>';
        echo $students['phone'] . '<br>';
        echo $students['email'] . '<br>';

        echo "<br><br>";

        foreach ($students as $key => $value) {
            // echo "$key - $value <br>";
            echo "$students[$key] <br>";
        }

        // Multidimensional arrays - Arrays containing one or more arrays
        $cars = [
            ['brand' => 'toyota', 'color' => 'red', 'price' => 400000],
            ['brand' => 'isuzu', 'color' => 'gray', 'price' => 500000],
            ['brand' => 'honda', 'color' => 'black', 'price' => 600000],
            ['brand' => 'nissan', 'color' => 'white', 'price' => 350000],
        ];

        echo "<br><br>";

        print_r($cars[0]);
        echo "<br>";
        print_r($cars[1]);
        echo "<br>";
        print_r($cars[2]);
        echo "<br>";
        print_r($cars[3]);

        echo "<br><br>";

        echo $cars[0]['brand'] . "<br>";
        echo $cars[0]['color'] . "<br>";
        echo $cars[0]['price'] . "<br>";

        echo "<br><br>";

        echo $cars[1]['brand'] . "<br>";
        echo $cars[1]['color'] . "<br>";
        echo $cars[1]['price'] . "<br>";

        echo "<br><br>";

        echo $cars[2]['brand'] . "<br>";
        echo $cars[2]['color'] . "<br>";
        echo $cars[2]['price'] . "<br>";

        echo "<br><br>";

        echo $cars[3]['brand'] . "<br>";
        echo $cars[3]['color'] . "<br>";
        echo $cars[3]['price'] . "<br>";

        echo "<br><br>";

        for ($i = 0; $i < count($cars); $i++) {
            //$i = 0,1,2,3
            print_r($cars[$i]);
            echo '<br>';

            // foreach ($cars[$i] as $key => $value) {
            //     echo "$key = $value <br>";
            // }

            $this->showCarNames($cars[$i]);
        }

        $this->addArrays();
        echo "<br><br>";
        $this->removeArrays();
    }

    private function showCarNames(array $cars)
    {
        foreach ($cars as $key => $value) {
            if ($key === 'price') {
                $value = 100000;
            }
            echo $cars[$key] . '<br>';
            // echo "$key = $value <br>";
        }
    }

    private function addArrays(): void
    {
        // add index array
        $fruits = array("Apple", "Banana", "Cherry");

        echo "<br><br>";

        print_r($fruits); // 3 index

        echo "<br><br>";

        $fruits[] = 'Orange'; // add singal value

        // add Multiple values
        array_push($fruits, "Pineapple", "Watermelon", "Coconut");

        print_r($fruits); // 7 index

        echo "<br><br>";

        // add Associative array
        $cars = array("brand" => "Ford", "model" => "Mustang");

        print_r($cars);

        echo "<br><br>";

        $cars['color'] = "Red"; // add singal value
        // add Multiple values
        $cars += ['price' => 400000, 'year' => 1964];

        print_r($cars);
    }

    private function removeArrays(): void
    {
        $cars = array("Volvo", "BMW", "Toyota");
        
        // array_splice($cars, 1, 1); // reindex
        // array_splice($cars, 1, 2); // reindex
        // unset($cars[1]); // not reindex
        unset($cars[0], $cars[2]); // not reindex

        print_r($cars); // unset index array

        $cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
        unset($cars['model']); // unset Associative array

        echo "<br><br>";

        print_r($cars);

        echo "<br><br>";


    }

    private function fullName(&$lastName, $firstName = 'MG')
    {
        $lastName = "GAY WAH";
        return "$firstName $lastName";
    }

    private function addFive(&$value)
    {
        $value += 5;
    }

    private function addFirstName(&$value)
    {
        // $value = "SAW " . $value;
        $value = "SAW $value";
    }

    private function sumMyNumbersByArray($x)
    {
        $n = 0;

        // var_dump($x);

        $len = count($x); // x ရဲ့အရေအတွက်/အရှည်

        for ($i = 0; $i < $len; $i++) {
            $n += $x[$i];
        }

        return $n;
    }

    private function sumMyNumbers(...$x)
    {
        $n = 0;

        // var_dump($x);

        $len = count($x); // x ရဲ့အရေအတွက်/အရှည်

        for ($i = 0; $i < $len; $i++) {
            $n += $x[$i];
        }

        return $n;
    }

    private function myFamily($lastName, ...$firstName)
    {
        $txt = "";
        $len = count($firstName);

        for ($i = 0; $i < $len; $i++) {
            $txt .= "$lastName $firstName[$i]<br>";
        }

        return $txt;
    }

    private function addNumber(int $a, int $b): array
    {
        return $a + $b;
        /**
         * function type (return, non-return)
         * int
         * string
         * double
         * boolean
         * array
         * null
         * collection
         */
    }
}
