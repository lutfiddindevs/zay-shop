<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::latest()->paginate(6);
        return view('shop', compact('categories', 'products'));
    }

    public function buySingle() {
        return view('shop-single');
    }
}
