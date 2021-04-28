<?php


namespace App\Http\Controllers;


use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoutesController extends \Illuminate\Routing\Controller
{
    use ApiCommunication;

    public function getRoute(Request $request)
    {
        $data = ['avoidVignette' => ['AUS','CHE']];


        $response = Http::post($this->apiURL('generateRoute'),$data);

        $body = $response->json();

        return $body;
    }
}
