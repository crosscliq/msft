<?php 
namespace Msft\Site\Routes;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Ticketing extends \Dsc\Routes\Group{
	
	
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
					'url_prefix' => '/ticketing'
				)
		);
		$this->add( '', 'GET', array(
								'controller' => 'Ticketing',
								'action' => 'display'
								));
	 	$this->add( '/create/@id', 'GET', array(
								'controller' => 'Ticketing',
								'action' => 'create'
								));
	 	$this->add( '/create/@id', 'POST', array(
								'controller' => 'Ticketing',
								'action' => 'add'
								));
	 	$this->add( '/create/@id', 'POST', array(
								'controller' => 'Ticketing',
								'action' => 'add'
								));
		/*
		$f3->route('GET /ticketing', '\Msft\Site\Controllers\Ticketing->display');
		        $f3->route('GET /ticketing/create/@id', '\Msft\Site\Controllers\Ticketing->create');
		        $f3->route('POST /ticketing/create/@id', '\Msft\Site\Controllers\Ticketing->add');
		        $f3->route('GET /ticketing/edit/@id', '\Msft\Site\Controllers\Ticketing->edit');
		        $f3->route('GET /ticketing/confirm/@id', '\Msft\Site\Controllers\Ticketing->confirm');
		*/
	
      
        
	}
}//Ticketing pages
        