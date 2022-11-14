<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function register (Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $request['password'] = Hash::make($request['password']);
        User::create($request->all());
        Alert::success('Sukses', 'User berhasil ditambahkan');
        return redirect()->to('/');
    }
}
