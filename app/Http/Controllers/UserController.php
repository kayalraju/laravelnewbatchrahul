<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }   
    public function registerPost(Request $request)
    {

     $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        //Auth::login($user); // Log the user in after registration
        return redirect()->route('login.view')->with('success', 'Registration successful!');
        
    }   
    public function login()
    {
        return view('login');
    } 
    public function loginPost(Request $request)
    {
       $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    } 
    public function userdashboard()
    {
        return view('userDashboard');
    } 
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login.view')->with('success', 'Logout successful!');
    } 
    
    

}
