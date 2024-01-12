<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect('admin/dashboard')->with('create-success', 'Welcome back!');
            }

            return redirect('/')->with('success', 'you are logged in successfully');
        }

        return back()->with('error','Login error')->onlyInput('email');
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success','you logged out');
    }

    public function register(){
        return view('auth.register');
    }

    public function post_register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $data['role'] = 'user';
        User::create($data);

        return redirect(route('login'))->with('create-success','register successfully');
    }

    // form front
    // rotue
    // controller function to return from view
    // submit form -> register function
    // redirect
    // login
}
