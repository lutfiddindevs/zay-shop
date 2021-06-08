<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;

class MainController extends Controller
{
    public function index() {
        $products = Product::inRandomOrder()->limit(3)->get();
        $banners = Banner::all();
        return view('main', compact('products', 'banners'));
    }

    public function showProduct($id) {
        $product = Product::find($id);
        return view('product', compact('product'));
    }
}
