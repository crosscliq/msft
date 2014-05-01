<?php 
namespace Dash\Site\Controllers;

class Dashboard extends BaseAuth 
{
    public function index($f3) {
    	$model = new \Dash\Models\Events;
        $state = $model->populateState()->getState();
        $model->setState('list.limit', 50);

        $list = $model->getItems();
        \Base::instance()->set('list', $list );

    	$view = new \Dsc\Template;
        echo $view->render('Dash/Site/Views::dashboard/home.php');
    }
}
?>