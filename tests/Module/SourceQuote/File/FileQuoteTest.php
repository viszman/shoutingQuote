<?php

namespace App\Module\SourceQuote\File;

use PHPUnit\Framework\TestCase;

class FileQuoteTest extends TestCase
{
    public function testGetQuotes()
    {
        $fileQuote = new FileQuote();

        $quotes = $fileQuote->getQuotes(' steve jobs', 2);
        $expected = [
            'Your time is limited, so don’t waste it living someone else’s life!',
            'The only way to do great work is to love what you do.'
        ];
        $this->assertEquals($expected, $quotes);

        $quotes = $fileQuote->getQuotes('steve-jobs', 2);
        $expected = [
            'Your time is limited, so don’t waste it living someone else’s life!',
            'The only way to do great work is to love what you do.'
        ];
        $this->assertEquals($expected, $quotes);

        $quotes = $fileQuote->getQuotes('steve-jobs', 1);
        $expected = [
            'Your time is limited, so don’t waste it living someone else’s life!',
        ];
        $this->assertEquals($expected, $quotes);

        $quotes = $fileQuote->getQuotes(' steve jobs', 2);
        $expected = [
            'The only way to do great work is to love what you do.',
            'Your time is limited, so don’t waste it living someone else’s life!'
        ];
        $this->assertNotEquals($expected, $quotes);

        $quotes = $fileQuote->getQuotes(' steve jobs', 4);
        $expected = [
            'The only way to do great work is to love what you do.',
            'Your time is limited, so don’t waste it living someone else’s life!'
        ];
        $this->assertNotEquals($expected, $quotes);
    }
}
