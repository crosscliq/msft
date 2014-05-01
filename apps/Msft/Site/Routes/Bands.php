<?php

namespace Msft\Site\Routes;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Bands extends \Dsc\Routes\Group{
	
	
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
					'url_prefix' => '/band'
				)
		);
		$this->add( '/@tagid', 'GET', array(
								'controller' => 'Tags',
								'action' => 'action'
								));
	 


	
      
        
	}
}