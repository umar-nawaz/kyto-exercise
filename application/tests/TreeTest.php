<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Tree
 * TODO: Setup phpunit before using it.
 */
final class TreeTest extends TestCase
{
    public function testValidTree()
    {
        $this->assertInstanceOf(
            Tree::class,
            Tree::create(5)
        );
    }
}
