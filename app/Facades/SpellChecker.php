<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SpellChecker extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return "SpellChecker";
    }
}
