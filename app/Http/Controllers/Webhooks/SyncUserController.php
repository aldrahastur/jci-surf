<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SyncUserController extends Controller
{

    function index(Request $request): JsonResponse
    {
        $requestData = $request->query();

        Log::debug($request->query('ID'));

        $userData = [
            'email' => $requestData['data']['user_email'],
            'firstname' => $requestData['user_meta']['first_name'][0],
            'lastname' => $requestData['user_meta']['last_name'][0],
            'name' => $requestData['data']['user_login'],
            'verified' => 1,
            'verified_at' => $requestData['data']['user_registered'],
            'created_at' => $requestData['data']['user_registered'],
            'original_reference' => $requestData['data']['ID'],
        ];

        $user = User::create($userData);

        $registrationRole = config('panel.registration_default_role');
        if (!$user->roles()->get()->contains($registrationRole)) {
            $user->roles()->attach($registrationRole);
        }

        return response()->json($userData);
    }
    function store(Request $request): JsonResponse
    {
        $requestData = $request->input();

        $userData = [
            'email' => $requestData['data']['user_email'],
            'firstname' => $requestData['user_meta']['first_name'][0],
            'lastname' => $requestData['user_meta']['last_name'][0],
            'name' => $requestData['data']['user_login'],
            'verified' => 1,
            'verified_at' => $requestData['data']['user_registered'],
            'created_at' => $requestData['data']['user_registered'],
            'original_reference' => $requestData['data']['ID'],
        ];

        $user = User::create($userData);

        $registrationRole = config('panel.registration_default_role');
        if (!$user->roles()->get()->contains($registrationRole)) {
            $user->roles()->attach($registrationRole);
        }

        return response()->json($userData);
    }
}
