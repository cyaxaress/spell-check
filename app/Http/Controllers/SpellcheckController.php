<?php
namespace App\Http\Controllers;

use App\Facades\SpellChecker;
use App\Services\ApiResponse;
use App\Services\XMLService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpellcheckController extends Controller
{
    public function check(Request $request):Response
    {
        $messages = XMLService::toArray($request->getContent());
        return ApiResponse::spellCheckResult(SpellChecker::checkAndCorrect($messages));
    }
}
