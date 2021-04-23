<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\MockObject\Api;

class FeedbackController extends Controller
{
    use ApiCommunication;
    public function __construct()
    {
        $this->middleware('auth.api');
    }

    public function index()
    {
        return view("feedback");
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl("user/{$request->get('process')}/feedbacks"), $request->request->all());
        $body = json_decode($response->body());

        if($response->ok()){
            session()->flash('success', $body->message);
            return redirect('/');
        }

        return back()->withErrors($body->message);
    }

}
