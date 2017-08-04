<?php
declare(strict_types=1);
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
		/*Get Query Parameters and pass to respective controller*/
		if ( isset($_SERVER['REQUEST_URI']) ) {
			$parts = parse_url( $_SERVER['REQUEST_URI'] );

			if (isset($parts['query'])) {
				parse_str($parts['query'], $query);
				$this->params = $query;
			}
		}

		$this->run();
	}

	/**
	* Main function of Application to start running application
	*/
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
				// TODO: Add ErrorController and use here.
				header('location: ' . URL . ' (Please check your request parameters)');
			}
		} else {
			$this->defaultAction();
		}
	}

	/**
	* Default behaviour of Application if no Controller or parameters
	* for example: http://{host}/kyto-exercise/public/index.php
	*/
	public function defaultAction()
	{
		try {
			include_once 'controller/Constants.php';
			$shapes = Constants::SHAPES;

			foreach ($shapes as $key => $controller) {
				
				if( file_exists(APP . 'controller/'. $controller . '.php'))
				{
					require APP . 'controller/'. $controller . '.php';
		        	$this->controller = $controller::create($this->params);
					
					$this->controller->index();
				}
			}
		} catch  (Exception $e) {
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}