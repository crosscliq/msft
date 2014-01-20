<?php 
namespace Dash\Controllers\Event;

class Roles extends \Dash\Controllers\BaseAuth 
{
    
    public function display() {
        \Base::instance()->set('pagetitle', 'Attendees');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Dash\Models\Event\Roles;
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();
        \Base::instance()->set('list', $list );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::event/attendees/list.php');
    }

}


?>