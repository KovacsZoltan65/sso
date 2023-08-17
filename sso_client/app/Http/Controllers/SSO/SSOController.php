<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SSOController extends Controller
{
    public function getLogin(Request $request){
        $request->session()->put('state', $state = Str::random(40));
        $query = http_build_query([
            'client_id' => '99e74928-220f-482e-8545-9f3101d2b08e',
            'redirect_uri' => 'http://localhost:8080/callback',
            'response_type' => 'code',
            'scope' => 'view-user',
            'state' => $state,
        ]);
        return redirect('http://localhost:8000/oauth/authorize?' . $query);
    }
    
    public function getCallback(Request $request){
        $state = $request->session()->pull('state');
    
        throw_unless(strlen($state) > 0 && $state == $request->state, InvalidArgumentException::class);

        $response = Http::asForm()->post(
            'http://localhost:8000/oauth/token',
            [
                'grant_type' => 'authorization_code',
                'client_id' => '99e74928-220f-482e-8545-9f3101d2b08e',
                'client_secret' => 'YgrDxWvAO79tMk7P8RznvcYasrvsq1GQC94lYOOm',
                'redirect_uri' => 'http://localhost:8080/callback',
                'code' => $request->code,
            ]
        );
        $request->session()->put($response->json());

        //return redirect('/authuser');
        return redirect(route('sso.connect'));
    }
    
    public function authUser(Request $request){
        $access_token = $request->session()->get('access_token');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $access_token,
        ])->get('http://localhost:8000/api/user');

        return $response->json();
    }
}
