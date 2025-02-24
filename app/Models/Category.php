<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class Category extends BaseModal
{
    public $name; // properties
    protected $brand;

    // object ကိုစတင်ခေါ်တဲ့အချိန်မှာအလုပ်လုပ်
    public function __construct()
    {
        $this->name = 'Helth';
    }

    // object ပိတ်တဲ့အချိန်မှာအလုပ်လုပ်
    public function __destruct()
    {
        // Session::put('message', "The first initialize category name is {$this->name}");
        echo "The first initialize category name is {$this->name}";
    }

    // attribute
    protected function getCategoryListAttribute()
    {
        return [
            'Fruit',
            'Electric',
            'Food',
            'Helth',
            'Babies',
        ];
    }

    public function  brandName(): string
    {
        return $this->checkValidString($this->brand);
    }

    // method
    public function checkValidCategory(): bool
    {
        // $array = $this->category_list;

        // if (in_array($this->name, $array)) {
        //     return true;
        // } else {
        //     return false;
        // }

        return in_array($this->name, $this->category_list);
    }

    public function qtyOfCategory(): string
    {
        $qty = $this->categories()[$this->name];
        return $this->returnMessage($this->name, $qty);
    }

    private function returnMessage($category, $qty)
    {
        return "The qty of {$category} is {$qty}";
    }

    private function categories(): array
    {
        return [
            'Fruit' => 100,
            'Electric' => 200,
            'Food' => 300,
            'Helth' => 400,
            'Babies' => 500,
        ];
    }



    private function checkValidString($string = null): string
    {
        return $string ?? 'Not found';
    }
}
