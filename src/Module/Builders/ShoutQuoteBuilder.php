<?php


namespace App\Module\Builders;


use App\Module\CacheShout\CacheFile;
use App\Module\Decorators\ExclamationDecorator;
use App\Module\Decorators\ShoutDecorator;
use App\Module\FamousPerson\FamousPerson;
use App\Module\SourceQuote\File\FileQuote;

class ShoutQuoteBuilder
{
    public function build()
    {
        $decorators = [
            new ShoutDecorator(),
            new ExclamationDecorator(),
        ];

        return new FamousPerson(new FileQuote(), $decorators, new CacheFile());
    }
}
