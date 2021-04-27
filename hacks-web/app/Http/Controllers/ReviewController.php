<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Support\Facades\Http;

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


}
