<?php

namespace App\Services;

use GuzzleHttp\Client;

class Spellcheck
{
    private static string $url = "https://languagetool.org/api/";

    public static function check(string $string, $lang = 'en-GB')
    {
        $client = new Client();
        $resp = $client->request("get", self::$url . "v2/check?text={$string}&language={$lang}");
        $resp = json_decode($resp->getBody()->getContents());
        $corrected = $string;
        foreach ($resp->matches as $match){
            $spell = substr($string, $match->offset, $match->length);
            $corrected = str_replace($spell, $match->replacements[0]->value, $corrected);
        }
        return $corrected;
    }
}