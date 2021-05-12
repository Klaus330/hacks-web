<?php

namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class InstitutionsController extends Controller
{
    use ApiCommunication;

    public function getInstitutionsList()
    {
        $response = Http::get($this->apiURL("institutionslist"));
        $body = json_decode($response->body());

        return $body;
    }

    public function getDepartmentsList(Request $request)
    {

        if (request()->has('q')) {
            $response = Http::post($this->apiURL("departmentslist"), ["institutionName" => request()->get('q')]);
        } else {
            return [];
        }

        $body = json_decode($response->body());

        return $body;
    }

    public function getInstitutionByName(Request $request)
    {
        if (request()->has('i')) {
            $response = Http::post($this->apiURL("user/institution/{$request->get('i')}"));

            $redis = Redis::Connection();
            $date = Carbon::today()->toDateString();
            $institution = $response->json()['id'];
            $redis->incr("$institution-$date");
        } else {
            return [];
        }

        return $response->json();
    }

    public function updateInstitutionDetails(Request $request)
    {
        $response1 = Http::post($this->apiURL("admin/updateinstitutions"), $request->request->all());
        $response2 = Http::post($this->apiURL("admin/updatedepartments"), $request->request->all());
        if ($response1->ok() && $response2->ok()) {
            return ["message" => "Datele au fost actualizate!"];
        }
        return ["message" => "Ups, a aparut o eroare!"];
    }


}
