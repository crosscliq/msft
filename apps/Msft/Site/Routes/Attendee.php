<?php

namespace Msft\Site\Routes;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Attendee extends \Dsc\Routes\Group{
	
	
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
					'url_prefix' => '/attendee'
				)
		);
		$this->add( '', 'GET', array(
								'controller' => 'Attendees',
								'action' => 'display'
								));
		$this->add( '/assign/tag/@tagid', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'assign'
								));
	 	$this->add( '/signin/@tagid', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'signin'
								));
	 	$this->add( '/create/@tagid', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'create'
								));
	 	$this->add( '/create/@tagid', 'POST', array(
								'controller' => 'Attendee',
								'action' => 'add'
								));
	 	$this->add( '/edit/@tagid', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'edit'
								));
	 	$this->add( '/customer/@id', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'attendee'
								));
	 	$this->add( '/customer/update/@id', 'POST', array(
								'controller' => 'Attendee',
								'action' => 'update'
								));
	 	$this->add( '/customer/confirm/@id', 'GET', array(
								'controller' => 'Attendee',
								'action' => 'confirm'
								));    
	}
}