<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function login() {
        return view('fe.login');
    }
    public function register() {
        return view('fe.register');
    }
    public function create(Request $req) {
      
        $req->merge(['password'=>Hash::make($req->password)]);
       
        try {
            User::create($req->all());
            return redirect()->route('login');
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    public function postlogin(Request $req) {
      
       
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('error','Sai thông tin đăng nhập');
        }
      
       
    }
    public function logout() {
      Auth::logout();
     return redirect()->back();
       
    }
}
