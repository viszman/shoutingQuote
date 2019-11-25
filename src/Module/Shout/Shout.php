<?php
namespace App\Module\Shout;

class Shout
{
    public function convert(string $quote): string
    {
        $upperCase = mb_strtoupper($quote);
        return $this->addExclamationMark($upperCase);
    }

    protected function addExclamationMark(string $quote): string
    {
        $reversed = strrev($quote);
        $reversed = str_replace('.', '!', $reversed);

        return strrev($reversed);
    }
}
