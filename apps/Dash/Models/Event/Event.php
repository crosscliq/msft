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
        $event['attendees'] = $model->paginate();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.offers.sms', true);
        $event['smsoptin'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.offers.email', 'on');
        $event['emailoptin'] = $model->getTotal();
        $model->emptyState();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.xboxone', 'on');
        $event['xboxone'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.xbox360', 'on');
        $event['xbox360'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.kinect', 'on');
        $event['kinect'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.surface', 'on');
        $event['surface'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.pc', 'on');
        $event['pc'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.windowsphone', 'on');
        $event['windowsphone'] = $model->getTotal();
        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.products.office', 'on');
        $event['office'] = $model->getTotal();

        $model = new \Dash\Models\Event\Attendees;
        $model->emptyState();
        $model->setState('filter.howdidyouhear', 'Radio');
        $event['howdidyouhear']['Radio'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'Social Media');
        $event['howdidyouhear']['Social Media'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'Friend/Family');
        $event['howdidyouhear']['Friend Family'] = $model->getTotal();

       
        $model->setState('filter.howd idyouhear', 'Mall Signage');
        $event['howdidyouhear']['MallSignage'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'Online');
        $event['howdidyouhear']['Online'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'Community Event');
        $event['howdidyouhear']['Community Event'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'Newspaper');
        $event['howdidyouhear']['Newspaper'] = $model->getTotal();

        $model->setState('filter.howdidyouhear', 'News');
        $event['howdidyouhear']['News'] = $model->getTotal();
        
        $model->setState('filter.howdidyouhear', 'Other');
        $event['howdidyouhear']['Other'] = $model->getTotal();


        $model = new \Dash\Models\Event\Wristbands;
        
        $event['wristbands'] = array();
        $event['wristbands']['withTicketsOnly'] = (int) $model->withTicketsOnly();
        $event['wristbands']['withAttendeesOnly'] = (int) $model->withAttendeesOnly();
        $event['wristbands']['withAttendeesAndTickets'] = (int) $model->withAttendeesAndTickets();
        $event['wristbands']['withNOAttendeesAndTickets'] = (int) $model->withNOAttendeesAndTickets();
        $event['wristbands']['total'] =  $event['details']->wristbands['ordered'];
        $event['wristbands']['used'] = $event['wristbands']['withTicketsOnly'] + $event['wristbands']['withAttendeesOnly'] + $event['wristbands']['withAttendeesAndTickets'] + $event['wristbands']['withNOAttendeesAndTickets'];
        $event['wristbands']['available'] = (int) $event['wristbands']['total'] - (int) $event['wristbands']['used'];



        //$model = new \Dash\Models\Event\Prizes;
        //$event['prizes'] = $model->paginate();

        //$model = new \Dash\Models\Event\Users;
        //$event['users'] = $model->paginate();
	

        $model = new \Dash\Models\Event\Tickets;
        
        $event['tickets'] = array();
        $model->setState('filter.status', 'active');
        $event['tickets']['active'] = $model->getTotal();
        $model->setState('filter.status', 'redeemed');
        $event['tickets']['redeemed'] = $model->getTotal();
        $event['tickets']['total'] = $model->getTotalCount();

       
        $model = new \Dash\Models\Event\Activities;
	 $model->setState('list.limit', 100);
        $paginated = $model->paginate();
        $list = array();
        foreach ($paginated['subset'] as $activity ) {
           $helper = new \Dash\Helpers\Activity($activity);
          $list[] = $helper->getData();      
        }
        $paginated['subset'] = $list;
         $event['activities'] =$paginated;
        


        return $event;



	}







}
