<?php
declare(strict_types=1);

/**
* Controller main class
*/
abstract class Controller
{
	protected $size = null;
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

	public function renderView(array $data) {

		if ( file_exists(APP . 'view/View.php')) {
			include_once APP . 'view/View.php';
			$this->view = new View($data);

			$this->view->render();
		}
	}

	abstract function index();
}
