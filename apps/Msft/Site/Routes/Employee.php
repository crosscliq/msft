<?php
namespace Msft\Site\Routes;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Employee extends \Dsc\Routes\Group{
	
	
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * Initializes all routes for this group
	 * NOTE: This method should be overriden by every group
	 */
	public function initialize(){

		$this->setDefaults(
				array(
					'namespace' => '\Msft\Site\Controllers',
					'url_prefix' => ''
				)
		);
		$this->add( '/home', 'GET', array(
								'controller' => 'Login',
								'action' => 'index'
								));
		$this->add( '/home', 'POST', array(
								'controller' => 'Login',
								'action' => 'auth'
								));
	 	  
	}
}