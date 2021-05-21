<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{

    use ApiCommunication;

    public function __construct()
    {
        $this->middleware("auth.api");
    }

    public function index()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        $request->validate([
            "username" => "required",
            "comment" => "required",
            "rating" => "required|integer"
        ]);

        $response = Http::post($this->apiURL("user/contact"), $request->request->all());

        if ($response->status() == 200) {
            session()->flash("succes", "Feedback-ul tau a fost inregistrat");
            return redirect('/');
        }
        $body = json_decode($response->body());
        return back()->withErrors($body->message);
    }


}
