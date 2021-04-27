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


    public function getProssesList()
    {

        if (request()->has('q')) {
            $response = Http::get($this->apiURL("processeslist/" . request()->get('q')));
        } else {
            $response = Http::get($this->apiURL("processeslist"));
        }

        $body = json_decode($response->body());
        return $body;

    }

    public function getProcessByName(){
        if(request()->has('p')) {
            $response = Http::get($this->apiURL("user/process/" . request()->get('p')));
        }
        else
        {
            return "No process data found";
        }

        $body = $response->json();
        return $body;
    }


}
