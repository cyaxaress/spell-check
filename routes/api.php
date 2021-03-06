<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "v1","namespace" => "App\\Http\\Controllers\\"], function(\Illuminate\Routing\Router $router){
    $router->post("getToken", "TokenController@getToken");
});



Route::group(["prefix" => "v1","namespace" => "App\\Http\\Controllers\\", "middleware" => ["auth:sanctum"]], function(\Illuminate\Routing\Router $router){
    $router->post("spellCheck", "SpellcheckController@check");
    $router->post("getDifferences", "ComparisonController@getDifferences");
});
