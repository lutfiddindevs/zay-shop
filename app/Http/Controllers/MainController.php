<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;

class MainController extends Controller
{
    public function index() {
        $products = Product::inRandomOrder()->limit(3)->get();
        $categories = Category::inRandomOrder()->limit(3)->get();
        $banners = Banner::all();
        return view('main', compact('products', 'banners', 'categories'));
    }

    public function showProduct($id) {
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    public function search(Request $req) {
        $data = Product::where('name', 'like', '%' . $req->input('search') . '%')->get();
    	return view('search', compact('data'));
    }
}
