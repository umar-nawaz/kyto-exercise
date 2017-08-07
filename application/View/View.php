<?php
namespace Ascii\View;
/**
* Class View for ASCII Shape
*/
class View 
{
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function render()
	{
		require 'templates/ShapeView.php';
	}
}