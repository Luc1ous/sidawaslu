<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        $checkUser = User::all()->count();
        if($checkUser < 1){
            return view('auth.register');
        } else {
            return view('auth.login');
        }
    }
    public function authenticate(Request $request){
        // dd(bcrypt('password'));
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Alert::success('Login Sukses', 'Anda berhasil login')->autoClose(2000);
            return redirect()->intended('/');
        } else {
            return back()->with('error', 'Login gagal, silahkan coba lagi !');
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
