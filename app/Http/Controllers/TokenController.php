<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTokenRequest;
use App\Services\ApiResponse;
use Illuminate\Http\Response;

class TokenController extends Controller
{
    public function getToken(GetTokenRequest $request): Response
    {
        if (!auth()->attempt([
            "username" => $request->Username,
            "password" => $request->Password,
        ])) {
            return ApiResponse::errorResponse("incorrect username or password");
        }
        $token = auth()->user()->createToken('API Token')->plainTextToken;
        return ApiResponse::successResponse("token", $token);
    }
}
