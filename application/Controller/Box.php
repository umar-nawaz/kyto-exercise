<?php

namespace Ascii\Controller;
/**
* A sample new Shape Class added to framework for testing.
*/
class Box extends Controller
{
	function __construct( array $params=null ) {
		parent::__construct($params);
	}

	public static function create($size)
	{
		return new Box($size);
	}

	public function index( array $params=null ) {
		$data = $this->makeBox();

		$this->renderView($data);
	}

	public function makeBox(): array {
	    $starsData = [];

	    for($lineNum = 0; $lineNum < $this->size; $lineNum++) {

	        $starsData[$lineNum] = str_repeat($this->brick, $this->size);
	    }

	    return $starsData;
	}
}