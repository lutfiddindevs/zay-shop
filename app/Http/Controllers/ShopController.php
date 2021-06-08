<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public $sorting;
    public $pagesize;
    public $products = '';

    public function index(Request $req) {
        $categories = Category::all();

        
        // if ($this->sorting == $req->newness) {
        //     $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);

        // } else if($this->sorting == $req->price) {
        //     $products = Product::orderBy('price', 'ASC')->paginate($this->pagesize);
        // } else if($this->sorting == $req->price_desc) {
        //     $products = Product::orderBy('price', 'DESC')->paginate($this->pagesize);
        // } else {
        //     $products = Product::paginate($this->pagesize);
        // }
        $products = Product::latest()->paginate(6);
        return view('shop', compact('categories', 'products'));
    }

    public function buySingle() {
        $products = Product::inRandomOrder()->limit(6)->get();
        return view('shop-single', compact('products'));
    }
}
