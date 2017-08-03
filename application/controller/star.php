<?php

/**
* Class ASCII Stars shape
*/
class Star extends Controller
{
	private $brick = 'X';
	private $wrapChar = '+';
	private $view = null;

	function __construct($params=null) {
		parent::__construct($params);

		if ( isset($params['brick']) ) {
			$this->brick = $params['brick'];
		}
	}

	public static function create($params=null)
	{
		return new Star($params);
	}

	public function index() {
		$data = $this->makeStar();
		$data = $this->wrapStar($data);

		if ( file_exists(APP . 'view/view.php')) {
			include_once APP . 'view/view.php';
			$this->view = new View($data);

			$this->view->render();
		}
	}

	public function makeStar() {
		// Remaining half of Diamond is built just by fliping it. 
		//And top/bottom lines are added in wrapStar()
		$size = ($this->size / 2) - 1; 
	    $starsData = [];

	    for($lineNum=0, $spaces=0; $lineNum < $size; $lineNum++) {
	    	
	    	if ($lineNum == 0) {
	    		$totalBricks = 1;
	    	}

	        $starsData[$lineNum] = $this->addSpaces($spaces) . $this->getBricks( $totalBricks );
	    	
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
		if (count($treeData) > 0) {
				
		    array_unshift($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
		    array_push($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
		    
		    foreach ($treeData as $key => $value) {
		    	$treeData[$key] = ' ' . $treeData[$key];
		    }
		    
		    $middle = count($treeData) / 2;
		    $treeData[$middle] = $this->wrapChar . trim($treeData[$middle]) . $this->wrapChar;
		}

		return $treeData;
	}

	public function getBricks( $num ) {
	    return str_repeat($this->brick, $num);
	}

	public function addSpaces( $spaces) {

	    if($spaces == 0) {
	    	return str_repeat(' ', $this->size -3);
		}

	    $spaces = ($this->size -3) - $spaces;
	    
	    return str_repeat(' ', $spaces);
	}
}