<?php

namespace App\Module\SourceQuote\File;

use App\Module\SourceQuote\Source;
use App\Module\Utility\Utils;
use ReflectionClass;

class FileQuote implements Source
{
    private $quotes;
    private $quoteFile = 'quotes.json';

    public function __construct()
    {
        $reflector = new ReflectionClass(__CLASS__);
        $file = $reflector->getFileName();
        $file = str_replace('FileQuote.php', '', $file);
        $file .= $this->quoteFile;
        $contents = file_get_contents($file);
        $this->quotes = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
    }

    public function getQuotes(string $famousPerson, int $count): array
    {
        $famousPerson = Utils::makeCommon($famousPerson);
        $foundQuotes = [];
        foreach ($this->quotes['quotes'] as $quote) {
            if ($famousPerson === Utils::makeCommon($quote['author'])) {
                $foundQuotes[] = $quote['quote'];
            }

            if (count($foundQuotes) === $count) {
                return $foundQuotes;
            }
        }

        return $foundQuotes;
    }

}
