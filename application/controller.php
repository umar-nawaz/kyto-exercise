<?php

/**
* Controller main class
*/
class Controller
{
	protected $size = null;
	protected $brick = 'X';
	protected $wrapChar = '+';
	protected $view = null;

    public function __construct($params=null) {
		include_once 'controller/constants.php';

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

	public function renderView($data) {

		if ( file_exists(APP . 'view/view.php')) {
			include_once APP . 'view/view.php';
			$this->view = new View($data);

			$this->view->render();
		}
	}
}
