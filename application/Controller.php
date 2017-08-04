<?php
declare(strict_types=1);

/**
* Shape Controller class
*/
abstract class Controller
{

	/**
	* Common Properties for all shapes
	*/
	protected $size = null;

	/* $brick is building block of every shape and can accept user's given value.*/
	protected $brick = 'X';	
	protected $wrapChar = '+';
	protected $view = null;

    public function __construct( array $params=null ) {
		include_once 'controller/Constants.php';

		if (isset($params['size'])) {
			
			if (isset( Constants::SIZE[$params['size']] )) {
				$this->size = Constants::SIZE[$params['size']];
			} else {
				 // just a random medium size
				$this->size = Constants::SIZE['M'];
			}
		} else {
			 // just a random medium size
			$this->size = Constants::SIZE['M'];
		}

		if ( isset($params['brick']) ) {
			$this->brick = $params['brick'];
		}
    }

	/**
	* Function: Get data and pass it to View, to though it on some Template 
	* Can be overriden in Child to give a custom View/Templates
	*/
	public function renderView(array $data) {

		if ( file_exists(APP . 'view/View.php')) {
			include_once APP . 'view/View.php';
			$this->view = new View($data);

			$this->view->render();
		}
	}


	/**
	* Added so that every new shape class implement it.
	*/
	abstract function index();
}
