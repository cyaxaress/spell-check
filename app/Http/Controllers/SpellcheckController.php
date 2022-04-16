<?php
namespace App\Http\Controllers;

use App\Services\ApiResponse;
use App\Services\Spellcheck;
use App\Services\XMLService;
use Illuminate\Http\Request;

class SpellcheckController extends Controller
{
    public function check(Request $request)
    {
        $messages = XMLService::toArray($request->getContent());
        $resp = [];
        foreach ($messages as $message){
            $message["original_message"] = $message["message"];
            // TODO set language
            $message["language"]["code"] = "en-GB";
            $message["message"] = Spellcheck::check($message["message"]);
            $resp[] = $message;
        }
        return ApiResponse::spellCheckResult($resp);
    }
}
