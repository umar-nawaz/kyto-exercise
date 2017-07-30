<?php

/**
* Class ASCII Stars shape
*/
class Star extends Controller
{
	private $size = null;

	function __construct($params=null) {

		if ( isset($params['size']) ) {
			$this->size = $params['size'];
		} else {
			$this->size = 'M';
		}
	}

	public function index($params=null) {
		$data = $this->makeStar();

		if ( file_exists(APP . 'view/starView.php')) {
			require APP . 'view/starView.php';
		}
	}

	public function makeStar() {
		$size = 5;
	    $starsData = [];

	    for($lineNum = 0, $bricks = 1; $lineNum < $size; $lineNum++, $bricks++) {

	        $starsData[$lineNum] = $this->prependSpace($lineNum, $size) . $this->getStars( $lineNum + $bricks ) . " </br>";
	    }

	    return $starsData;
	}

	public function getStars( $num ) {
	    return str_repeat("*", $num);
	}

	public function prependSpace( $lineNumber, $inputLines ) {
	    // the formula calculates the number of spaces/dashes 
	    // that are added at start of each line according to current line number
	    $spaces = (($inputLines*2-1) / 2 ) - $lineNumber;
	    
	    return str_repeat(" ", $spaces);
	}
}