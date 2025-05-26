<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\ValidationException;



class AuthController extends Controller
{

     // Display Login view
    public function showLogin()
    {
        return view('auth.login');
    }
    // validate Login form
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user) {
            // dd($user);
        if(Hash::check($request->password, $user->password)) {
                return redirect()->route('home.index');   
    
            } else {
                return redirect()->route('login')->with('error', 'Invalid password.');
            }
            
        } else {
            return redirect()->route('login')->with('error', 'The account does not exist.');
        }
    }


    

    // Display register view
    public function showRegister()
    {
        return view('auth.register');
    }

    //Post and Validate request 
    public function store(Request $request)
    {
        // dd('test');
        $request->validate([
            'name' => ['required','string','min:7','max:255'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed', Rules\Password::default()],
        ]);
        // dd('test');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //Authentication
        Auth::login($user);
        // Redirect the user to the dashboard after registration
        return redirect()->to('dashboard');
    }

    
    
}
