<?php
return [
    // Use a ready-made provider or develop any provider you want
    // If you want to implement your own provider don't forget
    // to implement App\Interfaces\SpellCheckerInterface
    "provider" => \App\Services\LanguageTool::class
];
