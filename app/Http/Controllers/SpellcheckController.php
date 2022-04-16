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
        return ApiResponse::spellCheckResult(Spellcheck::checkAndCorrect($messages));
    }
}
