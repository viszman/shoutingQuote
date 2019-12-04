<?php

namespace App\Module\FamousPerson;

use App\Module\CacheShout\Cache;
use App\Module\SourceQuote\Source;

class FamousPerson
{
    /**
     * @var \App\Module\SourceQuote\Source
     */
    private $source;
    /**
     * @var \App\Module\Decorators\ShoutDecorator
     */
    private $decorators;
    /**
     * @var \App\Module\CacheShout\Cache
     */
    private $cache;

    /**
     * FamousPerson constructor.
     *
     * @param \App\Module\SourceQuote\Source           $source
     * @param \App\Module\Decorators\StringDecorator[] $decorators
     * @param \App\Module\CacheShout\Cache             $cache
     */
    public function __construct(Source $source, array $decorators, Cache $cache)
    {
        $this->source = $source;
        $this->decorators = $decorators;
        $this->cache = $cache;
    }

    public function getPerson(string $famousPerson, int $count): array
    {
        $cached = $this->cache->checkCache($famousPerson, $count);
        if ($cached) {
            return $this->decorateQuote($cached);
        }
        $quotes = $this->source->getQuotes($famousPerson, $count);
        $this->cache->cacheContents($famousPerson, $quotes);

        return $this->decorateQuote($quotes);
    }

    /**
     * @param $quotes
     *
     * @return array
     */
    protected function decorateQuote(array $quotes): array
    {
        $shouted = [];
        foreach ($quotes as $quote) {
            foreach ($this->decorators as $decorator) {
                $quote = $decorator->decorate($quote);
            }
            $shouted[] = $quote;
        }

        return $shouted;
    }
}
