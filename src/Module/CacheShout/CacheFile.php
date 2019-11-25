<?php


namespace App\Module\CacheShout;


use App\Module\Utility\Utils;
use ReflectionClass;

class CacheFile implements Cache
{
    /**
     * @var string
     */
    private $pathToCacheFile;
    private $cached;

    public function __construct(string $pathToCacheFile = '../../../var/cacheQuote.json')
    {
        $this->pathToCacheFile = $pathToCacheFile;
        $this->createCacheFileIfNotExists();
    }

    public function cacheContents(string $famousPerson, array $quotes): void
    {
        $famousQuotes = $this->cached[Utils::makeCommon($famousPerson)] ?? [];
        if (count($famousQuotes) >= count($quotes)) {
            return; //we don't need to cache that
        }
        $this->cached[Utils::makeCommon($famousPerson)] = $quotes;
        file_put_contents($this->pathToCacheFile,
            json_encode(
                $this->cached,
                JSON_THROW_ON_ERROR,
                512
            )
        );
    }

    protected function getCachedContents()
    {
        $this->cached = json_decode(file_get_contents(
            $this->pathToCacheFile),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        return $this->cached;
    }

    public function checkCache(string $famousPerson, int $limit): array
    {
        $cached = $this->getCachedContents();
        $cachedQuotes = $cached[Utils::makeCommon($famousPerson)] ?? [];
        if (count($cachedQuotes) >= $limit) {
            return array_slice($cachedQuotes, 0, $limit);
        }
        return [];
    }

    protected function createCacheFileIfNotExists(): void
    {

        $reflector = new ReflectionClass(__CLASS__);
        $file = $reflector->getFileName();
        $file = str_replace('CacheFile.php', '', $file);
        $this->pathToCacheFile = $file . $this->pathToCacheFile;

        if (!file_exists($this->pathToCacheFile)) {
            file_put_contents($this->pathToCacheFile, '[]');
        }
    }
}
