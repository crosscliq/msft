<?php 

namespace Dash\Helpers;

//Convert Errors to Nice humaniness output

Class Errors {

	var $message = null;
	
	function __construct($model, $message) {

		$this->message = $message;
		$func = $model;
		
	
		if(method_exists($this, $func)) {
		 $this->$func();		
		} 
		
	
	}

	function getData(){
		return $this->message;
	}


	function attendee() {

		if(strpos($this->message, '$email_1')) {
			$this->message = "This email already is registered ";	
		}
		


	}


}