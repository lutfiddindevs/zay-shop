<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class MainController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('main', compact('banners'));
    }
}
