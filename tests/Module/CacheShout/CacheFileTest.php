<?php

namespace App\Module\CacheShout;


use PHPUnit\Framework\TestCase;

class CacheFileTest extends TestCase
{

    protected const VAR_CACHE_QUOTE_JSON = '../../../var/cacheQuote.json';

    public function testCacheContents()
    {
        $cache = new CacheFile(self::VAR_CACHE_QUOTE_JSON);
        echo getcwd();
        $toCache = [
            'The only way to do great work is to love what you do.',
            'Your time is limited, so don’t waste it living someone else’s life!'
        ];
        $cache->cacheContents('steve-jobs', $toCache);
        $this->assertTrue(true);
        @unlink(self::VAR_CACHE_QUOTE_JSON);
    }

    public function testCheckCache()
    {
        $cache = new CacheFile(self::VAR_CACHE_QUOTE_JSON);
        $toCache = [
            'The only way to do great work is to love what you do.',
            'Your time is limited, so don’t waste it living someone else’s life!'
        ];
        $cache->cacheContents('steve-jobs', $toCache);

        $this->assertEquals($toCache, $cache->checkCache('steve-jobs', 2));
        @unlink(self::VAR_CACHE_QUOTE_JSON);
    }
}
