<?php 
namespace Msft\Site\Controllers;

class Home extends Base 
{
    public function index()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('home/default.php');
    }

    
}
?> 