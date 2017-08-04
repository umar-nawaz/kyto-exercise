<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Shapes
 */
final class TreeTest extends TestCase
{
    public function testValidTree()
    {
        $this->assertInstanceOf(
            Star::class,
            Star::fromString('user@example.com')
        );
    }

    public function testInvalidTree()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
