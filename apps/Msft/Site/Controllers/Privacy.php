<?php 
namespace Msft\Site\Controllers;

class Privacy extends Base 
{   

    
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Privacy Policy');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('privacy/policy.php');
    }

}
?> 