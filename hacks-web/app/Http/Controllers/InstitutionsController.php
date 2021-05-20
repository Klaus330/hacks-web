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
        $institutionsJson = Http::get($this->apiURL("admin/updateinstitutionsrequest"));

        if($institutionsJson->ok()){
            $institutionsJson = $institutionsJson->json();

            $index = null;
            for($i=0; $i < count($institutionsJson); $i++){
                if($institutionsJson[$i]['name'] == $request->get('name')){
                    $index = $i;
                    break;
                }
            }

            $institutionsJson[$index]['name']= $request->get('name');
            $institutionsJson[$index]['phone'] = $request->get('phone');
            $institutionsJson[$index]['site'] = $request->get('url');
            $institutionsJson[$index]['address'] = $request->get('address');
            $institutionsJson[$index]['email']= $request->get('email');

            $response = Http::post($this->apiURL("admin/updateinstitutions"), $institutionsJson);
            if ($response->ok()) {
                return ["message" => "Datele au fost actualizate!"];
            }
        }


        return response()->json(['message' => $response->json()], 500);
    }


}
