<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SyncUserController extends Controller
{
    function store(Request $request): JsonResponse
    {
        $requestData = $request->input();

        $userData = [
            'email' => $requestData['user_email'],
            'name' => $requestData['user_login'],
            'verified' => 1,
            'verified_at' => $requestData['user_registered'],
            'created_at' => $requestData['user_registered'],
        ];



        return response()->json($userData);
    }
}
