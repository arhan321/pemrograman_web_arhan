<?php

namespace App\Http\Controllers;

use App\Models\Why;
use App\Models\Blog;
use App\Models\Home;
use App\Models\About;
use App\Models\Table;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Datachef;
use App\Models\Signature;
use App\Models\SosialMedium;
use Illuminate\Http\Request;

class frontend extends Controller
{

    // public function getdb() {
    //     $footer = Footer::all();
    //     $blog = Blog::with(['media'])->get();
    //     return view ('frontend.index', compact('footer','blog'));
    // }
    // public function home(){
    //     // $blog = Blog::all();
    //     return view ('frontend.home', compact('blog'));
    // }
    public function home(){
        $footer = Footer::all();
        $Home = Home::all();
        return view ('frontend.home', compact('Home','footer'));
    }

    public function reservasi(){
        // $Home = Home::all();
        return view ('layouts.reservasi');
    }

     public function abouts(){
        $footer = Footer::all();
        $whyus = Why::all();
        $About = About::all();
         return view ('frontend.about', compact('About','whyus','footer'));
     }
     
     public function menu(){
        $footer = Footer::all();
        $products = product::all();
        return view ('frontend.menu', compact('products','footer'));
    }

    public function signature() {
        $footer = Footer::all();
        $signatures = Signature::all();
        $categories = $signatures->pluck('category')->unique()->values()->all(); // Ambil kategori unik dari semua tanda tangan
    
        return view('frontend.signature', compact('signatures', 'categories','footer'));
    }

    public function testimonial(){
        $footer = Footer::all();
        return view ('frontend.testimonial', compact('footer'));
    }
    
    public function galery(){
        $footer = Footer::all();
        $galery = Gallery::all();
        return view ('frontend.galery', compact('galery','footer'));
    }
    
    public function chefs(){
        $footer = Footer::all();
        $chefs = Datachef::all();
        $icon = SosialMedium::all();
        return view ('frontend.chefs',compact('chefs','icon','footer'));
    }
    public function footer()
    {
        $footer = Footer::first();
        return view('layouts.inc.footers', compact('footer'));
    }


    // public function footer() {
    //     $footer = Footer::all();
    //     return view ('frontend.index', compact('footer'));
    // }

    // public function product () {
    //     $products = Product::all();
    //     return view ('frontend.index', compact('products'));
    // };
}
