<?php

/**
* Class ASCII Tree shape
*/
class Tree extends Controller
{
	function __construct($params=null) {
		parent::__construct($params);

		if ( isset($params['brick']) ) {
			$this->brick = $params['brick'];
		}
	}

	public static function create($size)
	{
		return new Tree($size);
	}

	public function index($params=null) {
		$data = $this->makeTree();
		$data = $this->wrapTree($data);

		$this->renderView($data);
	}

	public function makeTree() {
		$size = $this->size - 1; // 1 top line is optionaly added later in wrapTree()
	    $starsData = [];

	    for($lineNum = 0, $bricks = 1; $lineNum < $size; $lineNum++, $bricks++) {

	        $starsData[$lineNum] = $this->addSpace($lineNum) . $this->getBricks( $lineNum + $bricks );
	    }

	    return $starsData;
	}

	public function wrapTree($treeData)
	{
		if (count($treeData) > 0) {
	    	array_unshift($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
	    }

		return $treeData;
	}

	public function getBricks( $num ) {
	    return str_repeat($this->brick, $num);
	}

	public function addSpace( $lineNumber ) {
	    // the formula calculates the number of spaces/dashes 
	    // that are added at start of each line according to current line number
	    $spaces = $this->size - $lineNumber -2;
	    
	    return str_repeat(" ", $spaces);
	}
}