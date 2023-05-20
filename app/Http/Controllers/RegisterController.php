<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    //Show the form pf registration route
    public function show() {
        return view('auth.register');
    }
    //Post the form of registration
    public function register(RegisterRequest $request) {
        $storedData = User::create($request->validated());
        auth()->login($storedData);
        return redirect('/')-> with('success', 'Account successfully registered');
        
    }
}
