<?php 
namespace Site\Controllers;

class Attendees extends BaseAuth 
{	

	
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('attendee/home.php');
    }

}
?> 