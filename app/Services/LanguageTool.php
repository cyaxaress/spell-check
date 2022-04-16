<?php

namespace App\Services;

use App\Interfaces\SpellChecker;
use GuzzleHttp\Client;

class LanguageTool implements SpellChecker
{
    const URL = "https://languagetool.org/api/";
    private string $message, $language, $corrected;
    private array $matches;

    public function fix(string $message, string $language): string
    {
        $this->message = $message;
        $this->language = $language;
        $this->getMisspellMatches();
        $this->applyReplacements();
        return $this->corrected;
    }

    private function getMisspellMatches()
    {
        $client = new Client();
        $resp = $client->request("get", self::URL . "v2/check?text={$this->message}&language={$this->language}");
        $this->matches = json_decode($resp->getBody()->getContents())->matches;
    }

    private function applyReplacements()
    {
        $corrected = $this->message;
        foreach ($this->matches as $match) {
            $misspell = substr($this->message, $match->offset, $match->length);
            $corrected = str_replace($misspell, $match->replacements[0]->value, $corrected);
        }
        $this->corrected = $corrected;
    }
}
