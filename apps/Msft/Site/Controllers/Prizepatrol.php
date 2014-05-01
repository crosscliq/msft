<?php 
namespace Msft\Site\Controllers;

class Prizepatrol extends BaseAuth 
{   

    
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Prize Patrol');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('prizepatrol/home.php');
    }

}
?> 