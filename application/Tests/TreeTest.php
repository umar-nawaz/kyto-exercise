<?php
namespace Ascii\Tests;

use PHPUnit\Framework\TestCase;
use Ascii\Controller;

/**
 * @covers Tree
 * Class TreeTest is test coverage for Tree entity. 
 */
final class TreeTest extends TestCase
{
	public function setUp()
	{
    	$this->tree = new Controller\Tree(array('size' => 'M'));
	}

    public function testValidTree()
    {
        $this->assertInstanceOf(
            Controller\Tree::class,
            Controller\Tree::create(array('size' => 'M'))
        );
    }

	/**
	 * Validate if a given size tree returned by makeTree() equals the dumped input. 
	 */
    public function testMakeTreeDataPopulated()
    {
    	$dummyTree = array('     X','    XXX',
    		'   XXXXX','  XXXXXXX',' XXXXXXXXX','XXXXXXXXXXX');

    	$this->assertEquals(
    		$dummyTree,
    		$this->tree->makeTree()
    	);
    }
}
