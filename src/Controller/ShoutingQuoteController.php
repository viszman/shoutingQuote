<?php

namespace App\Controller;

use App\Module\CacheShout\CacheFile;
use App\Module\FamousPerson\FamousPerson;
use App\Module\Shout\Shout;
use App\Module\SourceQuote\File\FileQuote;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ShoutingQuoteController extends AbstractController
{
    /**
     * @Route("/shout/{famousPerson}", name="shouting_quote", methods={"GET"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $famousPerson
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Request $request, string $famousPerson): JsonResponse
    {
        $limit = (int)$request->query->get('limit');
        if ($limit > 10) {
            return $this->json(['message' => 'Number of quotes cannot exceed 10'], 404);
        }

        $personQuotes = new FamousPerson(new FileQuote(), new Shout(), new CacheFile());
        $quotesShouted = $personQuotes->getPerson($famousPerson, $limit);

        return $this->json($quotesShouted);
    }
}
