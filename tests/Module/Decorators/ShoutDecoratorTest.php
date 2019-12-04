<?php
declare(strict_types=1);

namespace App\Tests\Module\Decorators;

use App\Module\Decorators\ShoutDecorator;
use PHPUnit\Framework\TestCase;

class ShoutDecoratorTest extends TestCase
{
    public function testConvert()
    {
        $shoutingClass = new ShoutDecorator();
        $toShout1 = 'The question isn’t who is going to let me; it’s who is going to stop me.';
        $toShout2 = 'The question isn’t who is going to let me; it’s who is going to stop me!';

        $this->assertEquals(
            strtoupper('The question isn’t who is going to let me; it’s who is going to stop me.'),
            $shoutingClass->decorate($toShout1)
        );

        $this->assertEqualsIgnoringCase(
            strtoupper('The question isn’t who is going to let me; it’s who is going to stop me!'),
            $shoutingClass->decorate($toShout2)
        );
    }
}
