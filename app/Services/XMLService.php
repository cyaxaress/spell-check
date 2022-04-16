<?php
namespace App\Services;

class XMLService
{
    public static function toArray(string $xmlstring): array
    {
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $messages = json_decode($json,TRUE)["error_message"];
        if (!isset($messages[0])) $messages = [$messages];
        return $messages;
    }
}
