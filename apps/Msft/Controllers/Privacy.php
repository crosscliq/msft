<?php 
namespace Msft\Controllers;

class Privacy extends BaseAuth 
{   

    
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Privacy Policy');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('privacy/policy.php');
    }

}
?> 