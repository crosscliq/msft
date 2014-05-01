<?php 
namespace Msft\Site\Controllers;

class Meetgreets extends BaseAuth 
{   

    
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Prize Patrol');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('meetgreet/home.php');
    }

}
?> 