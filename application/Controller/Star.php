<?php
declare(strict_types=1);

namespace Ascii\Controller;
/**
* Class ASCII Stars shape
*/
class Star extends Controller
{
	function __construct( array $params=null ) {
		parent::__construct($params);

		if ( isset($params['brick']) ) {
			$this->brick = $params['brick'];
		}
	}

	public static function create( array $params=null )
	{
		return new Star($params);
	}

	public function index() {
		$data = $this->makeStar();
		$data = $this->wrapStar($data);

		$this->renderView($data);
	}

	/**
	* Function: Returns a dataset of strings per line to make a star shape
	* It only includes the core shape and not the Wrapping around of '+' charecter
	*/
	public function makeStar(): array {
		// Remaining half of Diamond is built just by fliping it. 
		//And top/bottom lines are added in wrapStar()
		$size = ($this->size / 2) - 1; 
	    $starsData = [];

	    for($lineNum=0, $spaces=0; $lineNum < $size; $lineNum++) {
	    	
	    	if ($lineNum == 0) {
	    		$totalBricks = 1;
	    	}

	        $starsData[$lineNum] = $this->addSpaces($spaces) . $this->getBricks( $totalBricks );
	    	
	    	$totalBricks = $totalBricks + 4; // Number of bricks in a line
	    	$spaces = $spaces +2;
	    }

	    // Flip the upper half shape of star and append to lower part
	    $reversed = array_reverse($starsData);
	    array_shift($reversed);
	    $starsData = array_merge($starsData, $reversed );

	    return $starsData;
	}

	/**
	* Function: Returns a dataset of strings per line to make a star shape
	* This Wraps the shape with '+' charecter
	*/
	public function wrapStar( array $treeData): array {
		
		if (count($treeData) > 0) {
			// Adding Identical rows in start and last by replacing brick to wrap (+) charecter 
		    array_unshift($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
		    array_push($treeData, str_replace($this->brick, $this->wrapChar, $treeData[0]) );
		    
		    foreach ($treeData as $key => $value) {
		    	$treeData[$key] = ' ' . $treeData[$key];
		    }
		    // Get middle row of star and wrap with '+'
		    $middle = count($treeData) / 2;
		    $treeData[$middle] = $this->wrapChar . trim($treeData[$middle]) . $this->wrapChar;
		}

		return $treeData;
	}

	public function getBricks(int $num ): string {
	    return str_repeat($this->brick, $num);
	}

	/**
	* Function: Returns string of spaces to be added in a line
	*/
	public function addSpaces(int $spaces): string {
		// first line case.
	    if($spaces == 0) {
	    	return str_repeat(' ', $this->size -3);
		}
		// formula to calculate spaces to prepend on a line 
	    $spaces = ($this->size -3) - $spaces;
	    
	    return str_repeat(' ', $spaces);
	}
}