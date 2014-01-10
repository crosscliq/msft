<?php 
namespace Dash\Controllers\Event;

class Event extends \Dash\Controllers\BaseAuth 
{
    
    public function display() {
        \Base::instance()->set('pagetitle', 'Events');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Dash\Models\Events;
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();
        \Base::instance()->set('list', $list );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::event/dashboard.php');
    }

}


?>