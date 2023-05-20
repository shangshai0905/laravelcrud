<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
 //Built in class that handles authentication for the user
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Display Login Page
    public function show() {
        return view('auth.login');
    }

    //Handle account login request
    public function login(LoginRequest $request) 
    {
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials))
        {
            return redirect()->to('login')->withErrors(trans('auth.failed'));

            // return redirect('login')-> with('errors', 'Invalid credentials');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        //authenticated is a function that handle the response after the user is authenticated
        return $this->authenticated($request, $user);
    }

    //handle response after user is authenticated
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

}
