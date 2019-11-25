<?php

namespace App\Controller;


use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShoutingQuoteControllerTest extends WebTestCase
{

    public static function getKernelClass()
    {
        return Kernel::class;
    }

    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/shout/steve-jobs?limit=3');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/shout/steve-jobs?limit=11');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', '/shout/steve-jobs?limit=3');
        $quotes = json_decode($client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $expected = [
            'YOUR TIME IS LIMITED, SO DON’T WASTE IT LIVING SOMEONE ELSE’S LIFE!',
            'THE ONLY WAY TO DO GREAT WORK IS TO LOVE WHAT YOU DO!'
        ];
        $this->assertEquals($expected, $quotes);

    }
}
