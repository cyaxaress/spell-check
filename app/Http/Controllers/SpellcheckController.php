<?php

namespace App\Http\Controllers;

use App\Facades\SpellChecker;
use App\Services\ApiResponse;
use App\Services\XMLService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpellcheckController extends Controller
{
    public function check(Request $request): Response
    {
        $messages = XMLService::toArray($request->getContent());
        $resp = [];
        foreach ($messages as $message){
            $message["original_message"] = $message["message"];
            $message["message"] = SpellChecker::checkAndCorrect($message["message"], $message["language"]["code"]);
            $resp[] = $message;
        }
        return ApiResponse::successResponse("error_messages", $resp);
    }
}
