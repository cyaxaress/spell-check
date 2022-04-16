<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use App\Services\Comparison;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComparisonController extends Controller
{

    public function getDifferences(Request $request): Response
    {
        return ApiResponse::successResponse("comparison", Comparison::getDifferences($request->error_messages));
    }
}
