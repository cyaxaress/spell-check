<?php

namespace App\Services;

use GuzzleHttp\Client;
use PhpSpellcheck\Spellchecker\LanguageTool;

class Spellcheck
{
    private static string $url = "https://languagetool.org/api/";

    public static function check(string $string, array $lang = ['en-GB'])
    {
        $client = new Client();
        $resp = $client->request("get", self::$url . "v2/check?text={$string}&language=en-GB");
        return json_decode($resp->getBody()->getContents());
    }
}
