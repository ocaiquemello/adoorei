<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TrackingCode;
use Exception;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Index');
    }

    public function store(Request $request)
    {
        try {
            $TrackingCode = new TrackingCode();

            $TrackingCode->tracking_code = $request->tracking_code;

            $TrackingCode->save();

            return response('Código de rastreio cadastrado com sucesso!', 201);
        } catch (Exception $e) {
            return response('Houve um erro ao cadastrar!', 500);
        }

    }

    public function get()
    {
        try {
            $TrackingCode = new TrackingCode();

            $tracking = $TrackingCode->all();

            return response($tracking, 200);
        } catch (Exception $e) {
            return response('Houve um erro ao buscar os códigos!', 500);
        }
    }

    public function getSingle($tracking_code)
    {
        $TrackingCode = new TrackingCode();

        $tracking = $TrackingCode::where('tracking_code', $tracking_code)->first();

        return $tracking;
    }

    public function fetchTrackingStatus($tracking_code)
    {
        // Initialize a connection with cURL (ch = cURL handle, or "channel")
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, 'https://track.ebanx.com/pt/t?trackingCode=LB496013106HK');

        // Set the HTTP method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // Return the response instead of printing it out
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Send the request and store the result in $response
        $response = curl_exec($ch);

        echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
        echo 'Response Body: ' . $response . PHP_EOL;

        // Close cURL resource to free up system resources
        curl_close($ch);
        // $client = new Client();

        // $response = $client->request('GET', 'https://track.ebanx.com/pt/t?trackingCode=LB496013106HK');

        // dd($response->getBody()->getContents());

        // echo $response->getBody();
    }
}
