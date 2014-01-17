<?php 
namespace Dash\Controllers\Event;

class Event extends \Dash\Controllers\BaseAuth 
{
    
    public function display($f3) {
        \Base::instance()->set('pagetitle', 'Events');
        \Base::instance()->set('subtitle', '');
        
       

        $model = new \Dash\Models\Events;
        $model->setFilter('event_id',$f3->get('PARAMS.eventid'));
        $event = $model->getItem();
     
        \Base::instance()->set('event', $event );
        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::event/dashboard.php');
    }

}


?>