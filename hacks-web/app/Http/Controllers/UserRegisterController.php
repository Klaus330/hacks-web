<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.api');
    }

    /**
    Shows register form
     */
    public function register()
    {
        return view('auth.register');
    }


    /**
    Create a new user in the api db
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email'=>'required|email',
            'username' => 'required',
            'password'=>'required|min:5|confirmed',
            "password_confirmation"=>'required'
        ]);

        $response = Http::post('https://bureaucracyhackshostat.herokuapp.com/registration', $request->request->all())->body();
        $response = json_decode($response);
        if($response->statusCode == 200){

//            $request->session()->put('user', $response->user);
            redirect(route('home'));
        }

        return back()->withErrors([$response->message]);

    }
}
