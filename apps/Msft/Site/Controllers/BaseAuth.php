<?php 
namespace Msft\Site\Controllers;

class BaseAuth extends \Users\Site\Controllers\Auth 
{	
	
	public function beforeRoute()
    {	\Dsc\System::instance()->get( 'session' )->set( 'site.login.redirect', '/roles' );
        $this->requireIdentity();
        
    }

}

?>
