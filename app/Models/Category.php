<?php

namespace App\Models;

class Category extends BaseModal
{
    public $menuName; // properties

    // public function __construct($menu) {
    //     $this->menuName = $menu;
    // }

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

}
