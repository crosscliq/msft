<?php 
namespace Msft\Site\Controllers;

class Mc extends BaseAuth 
{

    
    public function display()
    {
        \Base::instance()->set('pagetitle', 'MC');
        \Base::instance()->set('subtitle', '');
        
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('mc/home.php');
    }

}