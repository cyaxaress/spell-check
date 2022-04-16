<?php

namespace App\Services;

use Illuminate\Http\Response;

class ApiResponse
{
    public static function successResponse(string $key, $data): Response
    {
        $obj = [
            'success' => true,
            'code' => 200,
            $key => $data
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
}
