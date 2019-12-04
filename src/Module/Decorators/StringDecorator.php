<?php


namespace App\Module\Decorators;


interface StringDecorator
{
    public function decorate(string $toDecorate): string;
}
