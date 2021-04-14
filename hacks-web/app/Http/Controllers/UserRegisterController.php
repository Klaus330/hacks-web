<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserRegisterController extends Controller
{
    use ApiCommunication;

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
            "password_confirmation"=>'required',
            'terms' => 'required'
        ]);

        $response = Http::post($this->apiURL("registration"), $request->request->all());
        $body = json_decode($response);

        if($response->status() == 200){
            session()->flash('success', $body->message);
            return redirect(route('home'));
        }

        return back()->withErrors([$body->message]);

    }
}
