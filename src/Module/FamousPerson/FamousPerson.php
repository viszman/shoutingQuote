<?php

namespace App\Module\FamousPerson;

use App\Module\CacheShout\Cache;
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
    /**
     * @var \App\Module\CacheShout\Cache
     */
    private $cache;

    public function __construct(Source $source, Shout $shouter, Cache $cache)
    {
        $this->source = $source;
        $this->shouter = $shouter;
        $this->cache = $cache;
    }

    public function getPerson(string $famousPerson, int $count): array
    {
        $cached = $this->cache->checkCache($famousPerson, $count);
        if ($cached) {
            return $this->shoutQuote($cached);
        }
        $quotes = $this->source->getQuotes($famousPerson, $count);
        $this->cache->cacheContents($famousPerson, $quotes);

        return $this->shoutQuote($quotes);
    }

    /**
     * @param $quotes
     *
     * @return array
     */
    protected function shoutQuote(array $quotes): array
    {
        $shouted = [];
        foreach ($quotes as $quote) {
            $shouted[] = $this->shouter->convert($quote);
        }

        return $shouted;
    }
}
