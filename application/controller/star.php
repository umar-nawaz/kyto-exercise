<?php

/**
* Class ASCII Stars shape
*/
class Star extends Controller
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
		return new Star($size);
	}

	public function index($params=null) {
		$data = $this->makeStar();
		$data = $this->wrapStar($data);

		if ( file_exists(APP . 'view/starView.php')) {
			require APP . 'view/starView.php';
		}
	}

	public function makeStar() {
		$size = 5;
	    $starsData = [];

	    for($lineNum=0, $spaces=0; $lineNum < $size; $lineNum++) {
	    	
	    	if ($lineNum == 0) {
	    		$totalBricks = 1;
	    	}

	        $starsData[$lineNum] = $this->addSpaces($spaces, $size) . $this->getBricks( $totalBricks );
	    	
	    	$totalBricks = $totalBricks + 4;
	    	$spaces = $spaces +2;
	    }

	    $reversed = array_reverse($starsData);
	    array_shift($reversed);
	    $starsData = array_merge($starsData, $reversed );

	    return $starsData;
	}

	public function wrapStar($treeData)
	{

	    array_unshift($treeData, str_replace($this->blockChar, $this->wrapChar, $treeData[0]) );
	    array_push($treeData, str_replace($this->blockChar, $this->wrapChar, $treeData[0]) );
	    
	    foreach ($treeData as $key => $value) {
	    	$treeData[$key] = ' ' . $treeData[$key];
	    }
	    
	    $middle = count($treeData) / 2;
	    $treeData[$middle] = $this->wrapChar . trim($treeData[$middle]) . $this->wrapChar;

		return $treeData;
	}

	public function getBricks( $num ) {
	    return str_repeat($this->blockChar, $num);
	}

	public function addSpaces( $spaces, $inputLines ) {

	    if($spaces == 0) {
	    	return str_repeat(" ", $inputLines*2 - 2);
		}

	    $spaces = ($inputLines*2 -2) - $spaces;
	    
	    return str_repeat(" ", $spaces);
	}
}