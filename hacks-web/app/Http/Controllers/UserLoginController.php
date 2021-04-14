<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserLoginController extends Controller
{
    use ApiCommunication;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.api')->except('logout');
    }



    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);


        $response = Http::post($this->apiURL("login"), $request->request->all());
        $body = json_decode($response->body());
        if($response->status() == 200){
            $request->session()->put('user', json_decode($body->user));
            session()->flash('success', $body->message);
            return redirect('/');
        }
        return back()->withErrors([$response->message]);
    }

    public function logout(Request $request){
        \Illuminate\Support\Facades\Session::remove('user');
        return redirect(route('home'));
    }

}
