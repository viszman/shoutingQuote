<?php
namespace App\Module\SourceQuote;

interface Source
{
    public function getQuotes(string $famousPerson, int $count);
}
