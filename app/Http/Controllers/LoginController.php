<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanLogin(){
        return view('login');
    }
    public function postlogin(Request $request){
        $request->validate([
            'officer_id'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($request->only('officer_id','password'))){
            return redirect('/dashboard')->with('success','Login Berhasil!');
        }    
        return redirect('/')->with('error','ID atau Password Salah');
    }
    public function logout(){
       Auth::logout();
       return redirect('/')->with('success','Logout Berhasil!');
    }
}
