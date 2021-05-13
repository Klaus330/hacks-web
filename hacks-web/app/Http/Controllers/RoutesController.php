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
        $response = Http::post($this->apiURL('generateRoute'),$request->request->all());

        $body = $response->json();

        return $body;
    }
}
