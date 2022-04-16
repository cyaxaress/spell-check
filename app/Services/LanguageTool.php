<?php

namespace App\Services;

use App\Interfaces\SpellChecker;
use GuzzleHttp\Client;

class LanguageTool implements SpellChecker
{
    const URL = "https://languagetool.org/api/";
    private string $message, $language, $corrected;

    public function fix(string $message, string $language): string
    {
        $this->message = $message;
        $this->language = $language;
        $matches = $this->getMisspellMatches();
        $this->applyReplacements($matches);
        return $this->corrected;
    }

    private function getMisspellMatches()
    {
        $client = new Client();
        $resp = $client->request("get", self::URL . "v2/check?text={$this->message}&language={$this->language}");
        return json_decode($resp->getBody()->getContents())->matches;
    }

    private function applyReplacements($matches)
    {
        $corrected = $this->message;
        foreach ($matches as $match) {
            $misspell = substr($this->message, $match->offset, $match->length);
            $corrected = str_replace($misspell, $match->replacements[0]->value, $corrected);
        }
        $this->corrected = $corrected;
    }
}
