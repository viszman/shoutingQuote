<?php

namespace App\Module\Decorators;

class ShoutDecorator implements StringDecorator
{
    public function decorate(string $quote): string
    {
        return mb_strtoupper($quote);
    }
}
