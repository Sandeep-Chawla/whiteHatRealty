<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
    * AuthController Class
    *
    * @Author- Mr. Vivek Ranjan
    * @Contact No.- 9827029863 / 9400365935
    * @email- 16cs086vive@gmail.com
    * @App-version 1.0
    * @description user controller
    *
    * @Functions- Login System for the admin panel
    */
    
    public function loginView(){
        $title = 'Login Admin';
        return view('admin.auth.login',['title' => $title]);
    }

    public function login(Request $request){

        $request->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'credentials' => 'Your provided credentials do not match in our records.',
        ]);

    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}