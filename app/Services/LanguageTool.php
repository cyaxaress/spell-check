<?php

namespace App\Services;

use App\Interfaces\SpellChecker;
use GuzzleHttp\Client;

class LanguageTool implements SpellChecker
{
    private string $url = "https://languagetool.org/api/";

    public function checkAndCorrect(string $message, string $language): string
    {
        $matches = $this->getMisspellMatches($message, $language);
        return $this->fixMisspells($matches, $message);
    }

    public function getMisspellMatches(string $string, $lang)
    {
        $client = new Client();
        $resp = $client->request("get", $this->url . "v2/check?text={$string}&language={$lang}");
        return json_decode($resp->getBody()->getContents())->matches;
    }

    public function fixMisspells(array $matches, string $string): string
    {
        $corrected = $string;
        foreach ($matches as $match) {
            $misspell = substr($string, $match->offset, $match->length);
            $corrected = str_replace($misspell, $match->replacements[0]->value, $corrected);
        }
        return $corrected;
    }
}
