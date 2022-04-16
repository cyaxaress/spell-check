<?php

namespace App\Services;

class ApiResponse
{

    static function tokenResponse($token)
    {
        $obj = [
            'success' => true,
            'code' => 200,
            'token' => $token
        ];
        return response($obj, 200);
    }

    static function errorResponse($errorMessage, $code = 400, $data = [])
    {
        $obj = [
            'success' => false,
            'errorMessage' => $errorMessage,
            "data" => $data
        ];
        return response($obj, $code);
    }

    public static function spellCheckResult(array $resp)
    {
        $obj = [
            'success' => true,
            'code' => 200,
            "error_messages" => $resp
        ];
        return response($obj, 200);
    }
}
