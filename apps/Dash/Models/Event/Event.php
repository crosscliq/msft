<?php 

namespace Dash\Models\Event;

Class Event {



	function getAllEventInfo($event_id, $collection = null) {
		$f3 = \Base::instance();

		$event = array();

        $model = new \Dash\Models\Events;
        $model->setFilter('event_id', $event_id);
        $event['details'] = $model->getItem();

        $f3->set('eventid',  $event['details']->event_id);

        $model = new \Dash\Models\Event\Attendees;
        $list = $model->paginate();
        $event['attendees'] = $model->paginate();

        $model = new \Dash\Models\Event\Wristbands;
        $count = $model->withTicketsOnly();
        $event['wristbands'] = array();

        $event['wristbands']['withTicketsOnly'] = $model->withTicketsOnly();
        $event['wristbands']['withAttendeesOnly'] = $model->withAttendeesOnly();
        $event['wristbands']['withAttendeesAndTickets'] = $model->withAttendeesAndTickets();
        $event['wristbands']['withNOAttendeesAndTickets'] = $model->withNOAttendeesAndTickets();

        $model = new \Dash\Models\Event\Prizes;
        $list = $model->paginate();
        $event['prizes'] = $model->paginate();

         $model = new \Dash\Models\Event\Users;
        $list = $model->paginate();
        $event['users'] = $model->paginate();


        return $event;



	}







}