<?php


namespace App\Http\Controllers;

use App\Http\Trait\ApiCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    use ApiCommunication;

    public function __construct()
    {
        $this->middleware('auth.api');
    }

    public function settings()
    {
        return view('settings.usersettings');
    }

    public function updatePersonalData(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'dataNastere' => 'required',
            'judet' => 'required',
            'localitate' => 'required',
            'phone' => 'required',
            'cnp' => 'required|min:13',
            'serieBuletin' => 'required|min:2',
            'numarBuletin' => 'required|min:6'
        ]);


        session()->get('user')->address = $request->get("address");
        session()->get('user')->phone = $request->get("phone");
        session()->get('user')->serieBuletin = $request->get("serieBuletin");
        session()->get('user')->localitate = $request->get("localitate");
        session()->get('user')->judet = $request->get("judet");
        session()->get('user')->dataNastere = $request->get("dataNastere");
        session()->get('user')->cnp = $request->get("cnp");
        session()->get('user')->numarBuletin = $request->get("numarBuletin");
        session()->get('user')->judet = $request->get("judet");



        $response = Http::post($this->apiUrl("user/updatePersonalData"), $request->request->all());
        $body = $response->json();
        if ($response->status(302)) {
            session()->flash('success', 'Datele au fost actualizate cu succes');
            return redirect('/');
        }
        return back()->withErrors($body['message']);
    }
}
