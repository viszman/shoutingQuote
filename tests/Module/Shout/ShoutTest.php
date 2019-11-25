<?php
declare(strict_types=1);

namespace App\Module\Shout;

use PHPUnit\Framework\TestCase;

class ShoutTest extends TestCase
{
    public function testConvert()
    {
        $shoutingClass = new Shout();
        $toShout1 = 'The question isn’t who is going to let me; it’s who is going to stop me.';
        $toShout2 = 'The question isn’t who is going to let me; it’s who is going to stop me!';

        $this->assertEqualsIgnoringCase(
            'The question isn’t who is going to let me; it’s who is going to stop me!',
            $shoutingClass->convert($toShout1)
        );

        $this->assertEqualsIgnoringCase(
            'The question isn’t who is going to let me; it’s who is going to stop me!',
            $shoutingClass->convert($toShout2)
        );
    }
}
