<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class ApiController extends Controller
{
    public function getApiData(Request $req){
    	$client = new client();
    	//dd(json_decode($req->id));
    	$request = $client->get('http://localhost:8080/rest/getorder/v1/getOrderById/'.$req->id);
    	dd(json_decode($request->getBody()));
    }
}
