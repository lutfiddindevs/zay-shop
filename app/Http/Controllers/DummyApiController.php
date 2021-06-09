<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DummyApiController extends Controller
{
    public function listProducts() {
        return Product::all(); 
    }

    public function addProduct(Request $req) {
        $product = new Product;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->category_id = $req->category_id;
        $product->image = $req->image;
        $result = $product->save();
        if ($result) {
            return ["Result" => "Data has been saved"];
        } else {
        return ['Result' => 'Operation failed'];
        } 
    }
}
