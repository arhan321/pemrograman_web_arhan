<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class makan_tempat extends Controller
{
    public function getmakan()
    {
        $productsss = Product::all();
        return view('layouts.makan_di_tempat.makan',compact('productsss'));
    }
}
