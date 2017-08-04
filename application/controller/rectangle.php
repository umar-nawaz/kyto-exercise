<?php

/**
* A sample new Shape Class added to framework for testing.
*/
class Rectangle extends Controller
{
	function __construct($params=null) {
		parent::__construct($params);
	}

	public static function create($size)
	{
		return new Rectangle($size);
	}

	public function index($params=null) {
		$data = $this->makeRect();

		$this->renderView($data);
	}

	public function makeRect() {
	    $starsData = [];

	    for($lineNum = 0; $lineNum < $this->size; $lineNum++) {

	        $starsData[$lineNum] = str_repeat($this->brick, $lineNum);
	    }

	    return $starsData;
	}
}