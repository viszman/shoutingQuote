<?php

namespace App\Tests\Module\Decorators;

use App\Module\Decorators\ExclamationDecorator;
use PHPUnit\Framework\TestCase;

class ExclamationDecoratorTest extends TestCase
{
    public function testDecorate()
    {
        $exclamationDecorator = new ExclamationDecorator();
        $toShout1 = 'The question isn’t who is going to let me; it’s who is going to stop me.';
        $toShout2 = 'The question isn’t who is going to let me; it’s who is going to stop me!';

        $this->assertEquals(
            'The question isn’t who is going to let me; it’s who is going to stop me!',
            $exclamationDecorator->decorate($toShout1)
        );

        $this->assertEqualsIgnoringCase(
            'The question isn’t who is going to let me; it’s who is going to stop me!',
            $exclamationDecorator->decorate($toShout2)
        );
    }
}
