<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = [
            [
                'image' => 'web/img/blog/blog-1.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => '6 ways to prepare breakfast for 30',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
            [
                'image' => 'web/img/blog/blog-2.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => 'Visit the clean farm in the US',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
            [
                'image' => 'web/img/blog/blog-3.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => 'Cooking tips make cooking simple',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
            [
                'image' => 'web/img/blog/blog-4.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => 'Cooking tips make cooking simple',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
            [
                'image' => 'web/img/blog/blog-5.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => 'The Moment You Need To Remove Garlic From The Menu',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
            [
                'image' => 'web/img/blog/blog-6.jpg',
                'date' => now(),
                'comments' => 10,
                'title' => 'Cooking tips make cooking simple',
                'description' => 'Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                            quaerat',
            ],
        ];

        return view('web.blog.index', [
            'blogs' => $blogs
        ]);
    }
}
