<?php

/**
* Class ASCII Tree shape
*/
class Tree extends Controller
{
	private $size = null;
	private $blockChar = 'X';
	private $wrapChar = '+';

	function __construct($size=null) {

		if ( isset($size) ) {
			$this->size = $size;
		} else {
			$this->size = 5;
		}
	}

	public static function create($size)
	{
		return new Tree($size);
	}

	public function index($params=null) {
		$data = $this->makeTree();
		$data = $this->wrapTree($data);

		if ( file_exists(APP . 'view/starView.php')) {
			require APP . 'view/starView.php';
		}
	}

	public function makeTree() {
		$size = 5;
	    $starsData = [];

	    for($lineNum = 0, $bricks = 1; $lineNum < $size; $lineNum++, $bricks++) {

	        $starsData[$lineNum] = $this->prependSpace($lineNum, $size) . $this->getStars( $lineNum + $bricks );
	    }

	    return $starsData;
	}

	public function wrapTree($treeData)
	{

	    array_unshift($treeData, str_replace($this->blockChar, $this->wrapChar, $treeData[0]) );
	    
		return $treeData;
	}

	public function getStars( $num ) {
	    return str_repeat($this->blockChar, $num);
	}

	public function prependSpace( $lineNumber, $inputLines ) {
	    // the formula calculates the number of spaces/dashes 
	    // that are added at start of each line according to current line number
	    $spaces = $inputLines - $lineNumber -1;
	    
	    return str_repeat(" ", $spaces);
	}
}