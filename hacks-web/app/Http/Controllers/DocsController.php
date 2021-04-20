<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Support\Facades\Http;

class DocsController extends Controller
{
    use ApiCommunication;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('documents.index');
    }


    public function getDocsList(){
        $response = Http::get($this->apiURL("processeslist"));
        $body = json_decode($response->body());

        return $body;
    }
}
