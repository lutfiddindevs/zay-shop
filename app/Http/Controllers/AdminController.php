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
        return redirect('')->with('message', 'User has been created successfully!');
    }

    public function editUser($id) {
         $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function updateUser($id) {
        $user = User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($req->password),
                'visible_password' => $request->password,
                'address' => $request->address
            ]);
        session()->flash('message', 'User has been updated successfully');
        return redirect('/admin/users');
    }
}
