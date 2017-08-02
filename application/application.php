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
        $this->setProperties();

		if( isset($this->controller) )
		{
			if( file_exists(APP . 'controller/' . $this->controller . '.php'))
			{
				require APP . 'controller/' . $this->controller . '.php';
            	$this->controller = new $this->controller();
				
				$this->controller->index($this->params);
			}
			else{
				header('location: ' . URL . ' 404 problem');
			}
		} else {
			//$this->do_default();
		}
	}

	public function setProperties()
	{
		if (isset($_GET['shape'])) {
			$this->controller = $_GET['shape'];
		}

		if ( isset($_SERVER['REQUEST_URI']) ) {
			$parts = parse_url( $_SERVER['REQUEST_URI'] );

			if (isset($parts['query'])) {
				parse_str($parts['query'], $query);
				$this->params = $query;
			} else {
				$this->params = array('size' => 5 );
			}
		}
	}
}