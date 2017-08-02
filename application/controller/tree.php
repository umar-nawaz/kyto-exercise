<?php

/**
* Class ASCII Stars shape
*/
class Tree extends Controller
{
	private $size = null;

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

		if ( file_exists(APP . 'view/treeView.php')) {
			require APP . 'view/treeView.php';
		}
	}

	public function makeTree() {
		$size = 5;
	    $starsData = [];

	    for($lineNum = 0, $bricks = 1; $lineNum < $size; $lineNum++, $bricks++) {

	        $starsData[$lineNum] = $this->prependSpace($lineNum, $size) . $this->getStars( $lineNum + $bricks ) . " </br>";
	    }

	    return $starsData;
	}

	public function getStars( $num ) {
	    return str_repeat("+", $num);
	}

	public function prependSpace( $lineNumber, $inputLines ) {
	    // the formula calculates the number of spaces/dashes 
	    // that are added at start of each line according to current line number
	    $spaces = (($inputLines*2-1) / 2 ) - $lineNumber;
	    
	    return str_repeat(" ", $spaces);
	}
}