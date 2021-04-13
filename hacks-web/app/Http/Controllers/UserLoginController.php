<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use MongoDB\Driver\Session;

class UserLoginController extends Controller
{

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


        $response = Http::post('https://bureaucracyhackshostat.herokuapp.com/login', $request->request->all())->body();
        $response = json_decode($response);
        if($response->statusCode == 200){

            $request->session()->put('user', $response->user);
            return redirect('/');
        }
        return back()->withErrors([$response->message]);
    }

    public function logout(Request $request){
        \Illuminate\Support\Facades\Session::remove('user');
        return redirect(route('home'));
    }

}
