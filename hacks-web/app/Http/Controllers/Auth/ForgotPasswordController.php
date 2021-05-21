<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Trait\ApiCommunication;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use ApiCommunication;

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "newPassword" => "required|min:5|confirmed"
        ]);

        $response = Http::post($this->apiURL("changepassword"), $request->request->all());

        if ($response->successful()) {
            session()->flash("succes", "Mesajul de confirmare a fost trimis pe mail pentru a schimba parola!");
            return redirect("/");
        }

        $body = json_decode($response->body());
        return back()->withErrors($body->message);
    }

    use SendsPasswordResetEmails;
}
