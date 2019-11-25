<?php

namespace App\Module\FamousPerson;

use App\Module\Shout\Shout;
use App\Module\SourceQuote\File\FileQuote;
use PHPUnit\Framework\TestCase;

class FamousPersonTest extends TestCase
{

    public function testGetPerson()
    {
        $personQuotes = new FamousPerson(new FileQuote(), new Shout());
        $quotesShouted = $personQuotes->getPerson('steve-jobs', 2);

        $expected = [
            'YOUR TIME IS LIMITED, SO DON’T WASTE IT LIVING SOMEONE ELSE’S LIFE!',
            'THE ONLY WAY TO DO GREAT WORK IS TO LOVE WHAT YOU DO!'
        ];
        $this->assertEquals($quotesShouted, $expected);

        $personQuotes = new FamousPerson(new FileQuote(), new Shout());
        $quotesShouted = $personQuotes->getPerson('steve jobs', 1);

        $expected = [
            'YOUR TIME IS LIMITED, SO DON’T WASTE IT LIVING SOMEONE ELSE’S LIFE!',
        ];
        $this->assertEquals($quotesShouted, $expected);
    }
}
