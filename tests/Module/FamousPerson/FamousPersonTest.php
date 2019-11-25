<?php

namespace App\Module\FamousPerson;

use App\Module\CacheShout\CacheFile;
use App\Module\Shout\Shout;
use App\Module\SourceQuote\File\FileQuote;
use PHPUnit\Framework\TestCase;

class FamousPersonTest extends TestCase
{
    protected const VAR_CACHE_QUOTE_JSON = '../../../var/cacheQuote.json';

    public function testGetPerson()
    {
        $personQuotes = new FamousPerson(new FileQuote(), new Shout(),
            new CacheFile(self::VAR_CACHE_QUOTE_JSON));

        $quotesShouted = $personQuotes->getPerson('steve-jobs', 2);

        $expected = [
            'THE ONLY WAY TO DO GREAT WORK IS TO LOVE WHAT YOU DO!',
            'YOUR TIME IS LIMITED, SO DON’T WASTE IT LIVING SOMEONE ELSE’S LIFE!',
        ];
        $this->assertEquals($quotesShouted, $expected);

        $personQuotes = new FamousPerson(new FileQuote(), new Shout(),
            new CacheFile(self::VAR_CACHE_QUOTE_JSON));
        $quotesShouted = $personQuotes->getPerson('steve jobs', 1);

        $expected = [
            'THE ONLY WAY TO DO GREAT WORK IS TO LOVE WHAT YOU DO!',
        ];
        $this->assertEquals($quotesShouted, $expected);
    }
}
