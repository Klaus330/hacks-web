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
        $data = ['avoidVignette' => 'AUS'];


        $response = Http::send('get',$this->apiURL('generateRoute'), $data);

        dd($response);
        $body = json_decode($response->body());

        return $body;
    }
}
