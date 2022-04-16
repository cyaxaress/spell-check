<?php

namespace App\Services;

use Illuminate\Http\Response;

class ApiResponse
{

    static function tokenResponse($token): Response
    {
        $obj = [
            'success' => true,
            'code' => 200,
            'token' => $token
        ];
        return response($obj, 200);
    }

    static function errorResponse($errorMessage, $code = 400, $data = []): Response
    {
        $obj = [
            'success' => false,
            'errorMessage' => $errorMessage,
            "data" => $data
        ];
        return response($obj, $code);
    }

    public static function spellCheckResult(array $resp): Response
    {
        $obj = [
            'success' => true,
            'code' => 200,
            "error_messages" => $resp
        ];
        return response($obj, 200);
    }
}
