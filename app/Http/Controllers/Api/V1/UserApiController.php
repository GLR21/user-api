<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserApiRequest;
use Illuminate\Support\Facades\Http;

class UserApiController extends Controller
{
    public function index()
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($host .'/users');

        return $response->json();
    }

    public function show($id)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($host .'/users/'. $id);

        return $response->json();
    }

    public function store( StoreUserApiRequest $request)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($host .'/users/register', $request->all());

        return $response->json();
    }

}
