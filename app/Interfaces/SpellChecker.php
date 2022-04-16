<?php
namespace App\Interfaces;

interface SpellChecker
{
    public function checkAndCorrect(string $message, string $language);
}
