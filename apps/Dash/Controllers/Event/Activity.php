<?php 
namespace Dash\Controllers\Event;

class Activity extends \Dash\Controllers\BaseAuth 
{
    
    public function display() {
        \Base::instance()->set('pagetitle', 'Attendees');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Dash\Models\Event\Attendees;
        $model->setState('filter.profile.complete', 1);
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();
     
        \Base::instance()->set('list', $list );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        $view = new \Dsc\Template;
        $view->setLayout('event.php');
        echo $view->render('Dash/Views::event/attendees/list.php');
    }


    public function movetoattendee() {

    	$model = new \Dash\Models\Event\Activities;
        $model->setFilter('type', 'attendee');
        $model->setFilter('action', 'update');
        $list = $model->getList();

        foreach ($list as $key => $activity) {
        	$attendees = new \Dash\Models\Event\Attendees;
        	$values = $activity->object;
        	unset ($values['_id']);
        	$create = $attendees->create((array) $values);
        	
        	# code...
        }

    }

}


?>