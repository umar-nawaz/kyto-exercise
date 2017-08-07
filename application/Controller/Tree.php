<?php
declare(strict_types=1);

namespace Ascii\Controller;
/**
* Class ASCII Tree shape
*/
class Tree extends Controller
{
	function __construct( array $params=null ) {
		parent::__construct($params);

		if ( isset($params['brick']) ) {
			$this->brick = $params['brick'];
		}
	}

	public static function create($size)
	{
		return new Tree($size);
	}

	public function index( array $params=null ) {
		$data = $this->makeTree();
		$data = $this->wrapTree($data);

		$this->renderView($data);
	}

	/**
	* Function: Returns a dataset of strings per line to make a Tree shape
	* It only includes the core shape and not the Wrapping around of '+' charecter
	*/
	public function makeTree(): array {
		$size = $this->size - 1; // 1 top line is optionaly added later in wrapTree()
	    $starsData = [];

	    for($lineNum = 0, $bricks = 1; $lineNum < $size; $lineNum++, $bricks++) {

	        $starsData[$lineNum] = $this->addSpace($lineNum) . $this->getBricks( $lineNum + $bricks );
	    }

	    return $starsData;
	}

	/**
	* Function: Returns a dataset of strings per line to make a Tree shape
	* This Wraps the shape with '+' charecter
	*/
	public function wrapTree( array $treeData ): array {
		if (count($treeData) > 0) {
	    	array_unshift($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
	    }

		return $treeData;
	}

	public function getBricks(int $num ): string {
	    return str_repeat($this->brick, $num);
	}

	public function addSpace(int $lineNumber ): string {
	    // the formula calculates the number of spaces/dashes 
	    // that are added at start of each line according to current line number
	    $spaces = $this->size - $lineNumber -2;
	    
	    return str_repeat(" ", $spaces);
	}
}