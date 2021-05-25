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
        $response = Http::post($this->apiURL('generateroute'),$request->request->all());
        if($response->ok()){
            return $response->json();
        }
        return response()->json(['error' => $response->json()], 500);
    }
}
