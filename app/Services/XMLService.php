<?php
namespace App\Services;

class XMLService
{
    public static function toArray(string $xmlstring): array
    {
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $messages = [];
        foreach ($xml->error_message as $error_message) [
            $messages[] = [
                "message" => (string) $error_message->message,
                "title" => (string) $error_message->title,
                "module" => (string) $error_message->module,
                "language" => ["code" => (string) $error_message->message->attributes()->language]
            ]
        ];
        return $messages;
    }
}
