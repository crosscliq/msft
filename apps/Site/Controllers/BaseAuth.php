<?php 
namespace Site\Controllers;

class BaseAuth extends Base 
{	
	

    public function beforeRoute($f3){
        $user = $f3->get('SESSION.user');
        if(empty($user)){
        	if($_COOKIE['id']) {
        		$session = new \DB\Mongo\Session
        		$f3->set('SESSION', unserialize($session->read($_COOKIE['id'])))
        	}
        	$user = $f3->get('SESSION.user');
        	 if(empty($user)){
            $f3->reroute('/login');
        	}
        }
        
    }    
}
?>