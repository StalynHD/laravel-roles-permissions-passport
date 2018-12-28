<?php

namespace App\Http\Controllers\Passport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
	public function send($data)
	{	
		$client = new \GuzzleHttp\Client([
    	    		'base_uri' => 'http://127.0.0.1:8001',
    	            'time_out' => 2.0,
    	        ]);

		return $client->post('/oauth/token', $data);
	}


    public function generate(Request $request)
    {	
    	$data = [
    		'form_params' => [
    			'grant_type' => 'password',
	    		'client_id' => env('PASSWORD_CLIENT_ID'),
	    		'client_secret' => env('PASSWORD_CLIENT_SECRET'),
	    		'username' => $request->username,
	    		'password' => $request->password,
	    		'scope' => ''
	    	]
    	];

    	$res = $this->send($data);

    	return response($res->getBody()->getContents());
    }

    public function refresh(Request $request)
    {	
    	$data = [
    		'form_params' => [
    			'grant_type' => 'refresh_token',
	    		'refresh_token' => $request->refresh_token,
	    		'client_id' => env('PASSWORD_CLIENT_ID'),
	    		'client_secret' => env('PASSWORD_CLIENT_SECRET'),
	    		'scope' => ''
	    	]
    	];

    	$res = $this->send($data);

    	return response($res->getBody()->getContents());
    }
}
