<?php

namespace App\Services;

use GuzzleHttp\Client;

class LanguageTool
{
    private string $url = "https://languagetool.org/api/";

    public function check(string $string, string $lang): string
    {
        $client = new Client();
        $resp = $client->request("get", $this->url . "v2/check?text={$string}&language={$lang}");
        $resp = json_decode($resp->getBody()->getContents());
        $corrected = $string;
        foreach ($resp->matches as $match) {
            $spell = substr($string, $match->offset, $match->length);
            $corrected = str_replace($spell, $match->replacements[0]->value, $corrected);
        }
        return $corrected;
    }

    public function checkAndCorrect(array $messages): array
    {
        $resp = [];
        foreach ($messages as $message) {
            $message["original_message"] = $message["message"];
            $message["message"] = $this->check($message["message"], $message["language"]["code"]);
            $resp[] = $message;
        }
        return $resp;
    }
}
