<?php
namespace App\Interfaces;

interface SpellChecker
{
    public function fix(string $message, string $language);
}
