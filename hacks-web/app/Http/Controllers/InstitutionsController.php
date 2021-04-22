<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstitutionsController extends Controller
{
    use ApiCommunication;

    public function getInstitutionsList()
    {
        $response = Http::get($this->apiURL("institutionslist"));
        $body = json_decode($response->body());

        return $body;
    }
}
