<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComparisonRequest;
use App\Services\ApiResponse;
use App\Services\Comparison;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComparisonController extends Controller
{

    public function getDifferences(ComparisonRequest $request): Response
    {
        return ApiResponse::successResponse("comparison", Comparison::getDifferences($request->error_messages));
    }
}
