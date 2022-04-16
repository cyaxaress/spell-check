<?php

namespace App\Services;

class Comparison
{
    public static function getDifferences(array $messages): array
    {
        $resp = [];
        foreach ($messages as $message) {
            $message["distance"] = 4;
            $message["similarity"] = 97;
            $resp[] = $message;
        }
        return $resp;
    }
}
