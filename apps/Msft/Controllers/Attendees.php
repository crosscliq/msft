<?php 
namespace Msft\Controllers;

class Attendees extends BaseAuth 
{	

	
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('attendee/home.php');
    }

     public function own()
    {
        \Base::instance()->set('pagetitle', 'Welcome');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('attendee/own.php');
    }

}
?> 