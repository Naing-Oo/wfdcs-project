<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\District;
use App\Models\SubDistrict;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('web.home.index', compact('categories'));
    }

    public function districts($id)
    {
        $data = District::where('province_id', $id)
            ->get()
            ->map(fn($d) => [
                'id' => $d->id,
                'name' => $d->name_en,
            ]);

        return response()->json($data);
    }

    public function subDistricts($id)
    {
        $data = SubDistrict::where('district_id', $id)
            ->get()
            ->map(fn($d) => [
                'id' => $d->id,
                'name' => $d->name_en,
                'postcode' => $d->zip_code,
            ]);

        return response()->json($data);
    }
}
