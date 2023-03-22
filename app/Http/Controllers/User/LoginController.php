<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends UserBaseController
{
    /**
     * This function returns the customer login view
     * @return view
     */
    public function index()
    {
        return view('customer.login.login');
    }

    /**
     * This function validates customer login
     * @param LoginRequest $loginRequest
     * @return json
     */
    public function validateLogin(LoginRequest $loginRequest)
    {
        $credentials = ['username'=>$loginRequest->mobile,'password'=>$loginRequest->password,'user_type'=>2];
        if (Auth::attempt($credentials)){
            $response =  response()->json(['status'=>'success']);
        }else{
            $response =  response()->json(['status'=>'failed']);
        }
        return $response;
    }

    /**
     * This function is logouts the user, and destrys the session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::route('viewHome');
    }
}
