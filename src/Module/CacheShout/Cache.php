<?php


namespace App\Module\CacheShout;


interface Cache
{
    public function cacheContents(string $famousPerson, array $quotes);

    public function checkCache(string $famousPerson, int $limit);
}
