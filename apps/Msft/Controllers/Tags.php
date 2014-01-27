<?php 
namespace Msft\Controllers;

class Tags extends BaseAuth 
{	

	 protected function getModel() 
    {
        $model = new \Msft\Models\Tags;
        return $model; 
    }



    public function action($f3)
    {
        $tagid = $f3->get('PARAMS.tagid');
        $model = $this->getModel()->setState('filter.tagid', $tagid);
    	$tag = $model->getItem();

    	$role = $f3->get('SESSION.active_role');
    	
    	switch ($role) {
    		//Attendee Registration, we check to see if the tag is assigned to a user and bring up an new / edit form.
    		case 'attendee_registration':

    			//If the tag doesn't exist lets create a new empty tag
    			if(empty($tag)) {
    				$tag = $this->getModel()->getPrefab();
    				$tag->tagid = $tagid;
    				$tag->eventid = $f3->get('PARAMS.eventid');
    				$tag = $model->save((array) $tag);
    			}

    			$this->attendeeRegistration($tag, $tagid, $role);
    			break;
    		//Ticketing is  after they are in line they go inside and their ticket is actived
    		case 'ticketing':
    			$this->ticketing($tag, $tagid, $role);
    			break;
    		//
    		case 'prize_patrol':
    			$this->prizePatrol($tag, $tagid, $role);
    			break;
    		case 'meet_greet':
    			$this->meetGreet($tag, $tagid, $role);
    			break;
    		case 'gate_keeper':
    			$this->gateKeeper($tag, $tagid, $role);
    			break;
            case 'band_transfer':
                $this->bandTransfer($tag, $tagid, $role);
                break;
    		default:
           
    			$this->attendeeTapper($tag, $tagid, $role);
    			break;
    	}
    }
   
    protected function bandTransfer($tag,$tagid,$role) {
        $f3 =  \Base::instance();

        if(!empty($tag->_id) && empty($f3->get('SESSION.transfer'))) {
            $f3->reroute('/transfer/origin/'.$tag->_id);
        }
        if(empty($tag->_id) && !empty($f3->get('SESSION.transfer'))) {
            $f3->reroute('/transfer/destination/'.$tagid);
        }
        if(!empty($tag->_id) && !empty($f3->get('SESSION.transfer'))) {
            $f3->reroute('/transfer/notempty/'.$tagid);
        }


        if(empty($tag->_id)) {
            \Base::instance()->reroute('/transfer/empty/'.$tagid);
        }

        
    }

    //Attendee Registration, we check to see if the tag is assigned to a user and bring up an new / edit form.
    protected function attendeeRegistration($tag,$tagid,$role) {

    	if(empty($tag->attendee)) {
    		\Base::instance()->reroute('/attendee/create/'.$tag->_id);
    	} else {
    		\Base::instance()->reroute('/attendee/edit/'.$tag->attendee['id']);	
    	}
    	
    }
    //Ticketing is  after they are in line they go inside and their ticket is actived
    protected function ticketing($tag, $tagid, $role) {
          $f3 = \Base::instance();
        

        /*
        If the Tag is Empty, we need to create it here as well.
        */
        if(empty($tag)) {
            $tag = $this->getModel()->getPrefab();
            $tag->tagid = $tagid;
            $tag->eventid = $f3->get('PARAMS.eventid');
            $tag = $this->getModel()->save((array) $tag);
        }
        $ticketModel = new \Msft\Models\Tickets;
        if(empty($tag->ticket)) {

        $ticket = $ticketModel->getPrefab();
        $ticket->tag = array('tagid' => $tag->tagid , "id" => $tag->_id );
        $ticket = $ticketModel->save((array) $ticket);
        $tag->ticket = array( "id" => $ticket->_id, "status" => $ticket->status);
        $tag->save();

        } else {
         $ticket = $ticketModel->setState('filter.id',$tag->ticket['id'])->getItem();   

        }


        \Base::instance()->reroute('/ticketing/confirm/'.$ticket->_id);

    
    }

    //Ticketing is  after they are in line they go inside and their ticket is actived
    protected function prizePatrol($tag, $tagid, $role) {
        $this->emptyTag($tag);
    }

    //
    protected function meetGreet($tag, $tagid, $role) {
        $this->emptyTag($tag);
    }

    //This goes to inside of the event
    protected function gateKeeper($tag, $tagid, $role) {

         $f3 = \Base::instance();
        
        
        if(empty($tag)) {
             \Base::instance()->reroute('/gatekeeper/ticket/no/');
        }
        
        
        if(empty($tag->ticket)) {
            \Base::instance()->reroute('/gatekeeper/ticket/no/');
        } else {
         $ticketModel = new \Msft\Models\Tickets;
         $ticket = $ticketModel->setState('filter.id',$tag->ticket['id'])->getItem();
             if(empty($ticket)) {
                \Base::instance()->reroute('/gatekeeper/ticket/no/');
             }  else {
                if($ticket->redeemed) {
                   \Base::instance()->reroute('/gatekeeper/ticket/bad/'.$ticket->_id);  
                } else {
                    $ticket->redeemed = \Dsc\Mongo\Metastamp::getDate('now');
                    $ticket->status = 'redeemed';
                    $ticket->save();

                    $tag->{'ticket.status'} = 'redeemed';
                    $tag->save();  

                    

                   \Base::instance()->reroute('/gatekeeper/ticket/ok/'.$ticket->_id);
                }


             }

        }


    }
    
    //If here is no session
    protected function attendeeTapper($tag, $tagid, $role) {
        $this->emptyTag($tag);
    }

    //if there is an empty tag on a route that reqires a tag what do we do? error page or  what?
    protected function emptyTag($tag) {
        if(empty($tag)) {
           \Base::instance()->reroute('/empty');  
        }
    }

    public function displayEmpty() {
        $view = new \Dsc\Template;
        echo $view->render('Msft/Views::tags/empty.php');
    }

}
?> 