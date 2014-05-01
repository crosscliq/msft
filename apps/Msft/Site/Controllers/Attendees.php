<?php 
namespace Msft\Site\Controllers;

class Attendees extends BaseAuth 
{	

	
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('Msft/Site/Views::attendee/home.php');
    }
	
     public function own($f3)
    {
        \Base::instance()->set('pagetitle', 'Welcome');
        \Base::instance()->set('subtitle', '');
        
        
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('Msft/Site/Views::attendee/own.php');
    }

}
?> 
