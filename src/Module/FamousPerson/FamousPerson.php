<?php
namespace App\Module\FamousPerson;

use App\Module\Shout\Shout;
use App\Module\SourceQuote\Source;

class FamousPerson
{
    /**
     * @var \App\Module\SourceQuote\Source
     */
    private $source;
    /**
     * @var \App\Module\Shout\Shout
     */
    private $shouter;

    public function __construct(Source $source, Shout $shouter)
    {
        $this->source = $source;
        $this->shouter = $shouter;
    }

    public function getPerson(string $famousPerson, int $count): array
    {
        $quotes = $this->source->getQuotes($famousPerson, $count);
        $shouted = [];
        foreach ($quotes as $quote) {
            $shouted[] = $this->shouter->convert($quote);
        }

        return $shouted;
    }
}
