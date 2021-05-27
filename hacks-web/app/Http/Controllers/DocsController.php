<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
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
        // de tratat cazurile de eroare
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
        // de tratat cazurile de eroare
    }



    public function getProcessDetailsByInstitution(Request $request)
    {
        // de facut validare
        $response = Http::post($this->apiURL("admin/updateprocessesrequest"), [
            'institution' => $request->get('i'),
            "process" => $request->get('p')
        ]);

        return $response->json();
        // de tratat cazurile de eroare
    }


    public function updateProcessDetails(Request $request)
    {
        // de facut validare
        $response = Http::post($this->apiURL("admin/updateprocesses"), $request->request->all());
        return $response->body();
        // de tratat cazurile de eroare
    }

    public function getFileLink(Request $request)
    {
        // de facut validare
        $response = Http::post($this->apiURL("admin/getfilelink"), $request->request->all());
        return $response->body();
        // de tratat cazurile de eroare
    }



    public function getAutocompletedFile(Request $request)
    {

        $request->validate([
            "nume" => "required",
            "prenume" => "required",
            "dataNastere" => "required",
            "judet" => "required",
            "localitate" => "required",
            "telefon" => "required",
            "email" => "required|email",
            "adresa" => "required",
            "cnp" => "required|min:13",
            "serie" => "required|min:2",
            "numar_buletin" => "required|min:6",
            "url" => "required",
        ]);

        $response = Http::post("check-diff.herokuapp.com/complete-file", $request->request->all());

        if($response->ok())
        {
            return $response->body();
        }

        return response()->json(['error' => $response->json() ?? "NOT FOUND"], 500);
    }

}
