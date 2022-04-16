<?php

namespace App\Services;

class Comparison
{
    public static function getDifferences(array $messages): array
    {
        $resp = [];
        foreach ($messages as $message) {
            $message["distance"] = levenshtein($message["original_message"], $message["message"]);
            $message["similarity"] = ceil(self::calcSimilarity($message["distance"], $message["original_message"], $message["message"]) * 100);
            $resp[] = $message;
        }
        return $resp;
    }

    public static function calcSimilarity($distance ,$text1 , $text2)
    {
        return 1 - $distance / max([strlen($text1), strlen($text2)]);
    }
}
