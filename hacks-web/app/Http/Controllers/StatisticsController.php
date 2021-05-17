<?php


namespace App\Http\Controllers;


use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatisticsController extends Controller
{
    use ApiCommunication;

    public function getStatistics(Request $request)
    {
        if ($request->has('p') && $request->has('i')) {

            $response = Http::post($this->apiURL("statistics"), [
                "institution" => $request->get('i'),
                "process" => $request->get('p')
            ]);
            if ($response->ok())
                return $response->json();
        }
        return response()->json(['error' => $response->json()], 500);
    }
}
