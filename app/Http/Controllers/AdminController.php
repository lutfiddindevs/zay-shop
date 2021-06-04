<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function showUsers() {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function addUser() {
        return view('admin.user.create');
    }

    public function storeUser(Request $req) {
        $this->validate($req, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:3',
            'address' => 'required'
        ]);
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'visible_password' => $req->password,
            'password' => Hash::make($req->password),
            'address' => $req->address
        ]);
        return redirect('admin/users')->with('message', 'User has been created successfully!');
    }
}
