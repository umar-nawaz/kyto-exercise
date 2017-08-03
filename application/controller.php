<?php

/**
* Controller main class
*/
class Controller
{
	protected $size = null;

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
    }
}
