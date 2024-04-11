<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    function login() {
        return view('login');
    }
    
    function signup() {
        return view('signup');
    }

    function loginpost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $request->session()->flash('success', 'Successfully logged in.');
        
            return view('dashboard', compact('user'));
        }
        else{
            return redirect(route(name:'login'))->with('error', 'Invalid credentials');
            
        }
        
        
        
    }

    function signuppost(Request $request) {
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        
        $user = User::where('email', $request->email)->first();
        
        if($user){
            return redirect(route(name:'signup'))->with('error', 'Email already exists');
        }

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);

        
        if(!$user){

            return redirect(route(name:'signup'))->with('error', 'cannot submit credentials');
        }else{
            return redirect(route(name:'login'))->with('success', 'successful signup');
        }
        

    }
    function logout() {
       Session::flush();
       Auth::logout();
       return redirect(route(name:'login'));
    }


}