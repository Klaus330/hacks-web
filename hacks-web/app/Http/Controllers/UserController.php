<?php


namespace App\Http\Controllers;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.api');
    }

    public function settings()
    {
        return view('settings.usersettings');
    }
}
