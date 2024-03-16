<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function viewregisterForm(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required | regex:/(.*)@gmail\.com/',
            'pass' => 'required | min:8',
            'confpass' => 'required |min:8'
        ]);

        if($request->pass != $request->confpass){
            return back()->withErrors('the password didn\'t match');
        }

        User::create([
            'email' =>$request->email,
            'password' => Hash::make($request->pass)
        ]);

        return redirect('/login-form')->with('success', 'user registered!');
    }

    public function viewLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $user = User::where('email','=', $request->email)->first();
        // dd($request);
        if($user && Hash::check($request->pass, $user->password)){
            Auth::login($user);
            if(Auth::check()){
                return redirect('/');
            }else{
                return redirect('/login-form');
            }
        }else{
            return back()->withErrors('The provided credentials do not match out records.');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/login-form')->with('success', 'loged out successfully!');
    }
}
