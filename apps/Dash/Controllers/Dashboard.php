<?php 
namespace Dash\Controllers;

class Dashboard extends Base 
{
    public function beforeRoute($f3){

        $user = $f3->get('SESSION.user');
        if(empty($user)){
            $f3->reroute('/');
        }

    } 


    public function display() {

    	$view = new \Dsc\Template;
        echo $view->render('Dash/Views::dashboard/home.php');
    }




}
?>