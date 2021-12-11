<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register_view(){
        return view('auth.register');
    }

    public function login_view(){
        return view('auth.login');
    }

    public function register(Request $request){

        $rules = [

            'username' => 'required|string|min:5|max:12|unique:users',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:4|max:12',
            "confirm_password" => 'same:password'

        ];

        Validator::make($request->all(), $rules)->validate();

        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'remember_token' => Str::random(5)
        ]);
        
        return redirect()->route('login')->with('message', "Account created successfully");

    }

    public function login(Request $request){

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $credentials = Validator::make($request->all(), $rules)->validate();

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            
            return redirect()->intended('/home');

        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
        
    }

    public function logoutGet(){
        return redirect()->route('home');
    }

}
