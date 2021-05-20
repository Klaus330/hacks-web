<?php


namespace App\Http\Controllers;


use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepartmentsController extends Controller
{
    use ApiCommunication;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('departments.index');
    }

    public function getDepartmentByName(Request $request)
    {

        if (request()->has('i') && request()->has('d')) {

            $response = Http::post($this->apiURL("admin/updateprogramsrequest"), ["institution" => $request->get('i')]);

            $response = $response->json();
            $departments = $response["orar"]["programe"];

            foreach ($departments as $department) {
                if ($department["titlu"] == $request->get('d')) {
                    return $department;
                }
            }
        } else {
            return [];
        }
    }

    public function updateDepartmentsDetails(Request $request)
    {

        $response = Http::post($this->apiURL("admin/updateprogramsrequest"), ["institution" => $request->get('institution')]);
        if ($response->ok()) {
            $response = $response->json();
            $departments = $response["orar"]["programe"];
            $index = -1;
            for ($i = 0; $i < count($departments); $i++) {
                if ($departments[$i]["titlu"] == $request->get('dept')['titlu']) {
                    $index = $i;
                    break;
                }
            }

            if ($index != -1) {
                $departments[$i] = $request->get('dept');
            }

            $response["orar"]["programe"] = $departments;
            $response = Http::post($this->apiURL("admin/updateprograms"), $response);
            if ($response->ok()) {
                return $response->json();
            }
        }

        return response()->json(['error' => $response->json()], 500);
    }
}
