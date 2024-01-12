<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.user.list-users',[
            'users' => $users
        ]);
    }

    public function create(){
        return view('dashboard.user.create-user');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);
        $data['role'] = 'admin';
        User::create($data);
        return redirect('/admin/list-users')->with('create-success','User Created Successfully');
    }

    public function edit(User $user){

        if($user){
            return view('dashboard.user.edit-user',[
                'user' => $user
            ]);
        }
        return redirect('/admin/list-users')->with('error' , 'User Not found');
    }

    public function dashboard(){
        return view('dashboard.index');
    }

    public function update(Request $request ,User $user){
        if($user){
            $data = $request->validate([
                'name' => 'required|string|min:3|max:25',
                'email' => 'required|unique:users,email,'.$user->id,
                'password' => 'required|min:6'
            ]);
            $user->update($data);
            return redirect("/admin/list-users")->with('update-success' , 'User Updated Successfully!');
        }
        return redirect('/admin/list-users')->with('error' , 'User Not found');

    }

    public function delete(User $user){
        if($user){
            $user->delete();
            return redirect('/admin/list-users')->with('delete','User Deleted Successfully!');
        }
        return redirect('/admin/list-users')->with('error' , 'User Not found');
    }
}


// route
// form -> login
// login ()
// register
// logput
// forget password
// profile
// login social media
