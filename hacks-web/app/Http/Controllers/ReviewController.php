<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use ApiCommunication;

    public function index()
    {
        return view('admin/dashboard.index');
    }


    public function getReview()
    {

        $response = Http::get($this->apiURL("user/viewreviews"));
        return $response->json();

    }

    public function deleteReview(Request $request)
    {
        $response = Http::post($this->apiURL("admin/deleteReview"), $request->request->all());
        if($response->ok())
        {
             return $response->json();
        }
        return response()->json(['error' => $response->json()], 500);
    }


}
