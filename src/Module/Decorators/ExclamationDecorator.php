<?php


namespace App\Module\Decorators;


class ExclamationDecorator implements StringDecorator
{
    public function decorate(string $quote): string
    {
        $reversed = strrev($quote);
        $reversed = str_replace('.', '!', $reversed);

        return strrev($reversed);
    }
}
