<?php

/**
* Application main class
*/
class Application
{
	private $controller = null;
	private $params = null;
	
	function __construct()
	{
        if (isset($_GET['shape'])) {
			$this->controller = $_GET['shape'];
		}

		if ( isset($_SERVER['REQUEST_URI']) ) {
			$parts = parse_url( $_SERVER['REQUEST_URI'] );

			if (isset($parts['query'])) {
				parse_str($parts['query'], $query);
				$this->params = $query;
			}
		}

		$this->run();
	}

	public function run()
	{
		
		if( isset($this->controller) )
		{
			if( file_exists(APP . 'controller/' . $this->controller . '.php'))
			{
				require APP . 'controller/' . $this->controller . '.php';
            	$this->controller = $this->controller::create($this->params);
				
				$this->controller->index();
			}
			else{
				header('location: ' . URL . ' (Please check your request parameters)');
			}
		} else {
			$this->defaultAction();
		}
	}

	public function defaultAction()
	{
		include_once 'controller/constants.php';
		$shapes = Constants::SHAPES;

		foreach ($shapes as $key => $controller) {
			
			if( file_exists(APP . 'controller/'. $controller . '.php'))
			{
				require APP . 'controller/'. $controller . '.php';
	        	$this->controller = $controller::create($this->params);
				
				$this->controller->index();
			}
		}
	}
}