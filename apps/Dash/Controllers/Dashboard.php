<?php 
namespace Dash\Controllers;

class Dashboard extends BaseAuth 
{
    public function display($f3) {


    	$view = new \Dsc\Template;
        echo $view->render('Dash/Views::dashboard/home.php');
    }
}
?>