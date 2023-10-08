<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function login()  {
        return view('admin.login');
    }
    public function postLogin(Request $request)  {
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>1])){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error','Sai thong tin');
    }
    public function signout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
