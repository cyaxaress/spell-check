<?php
namespace App\Interfaces;

interface SpellChecker
{
    public function checkAndCorrect(array $messages);
}
