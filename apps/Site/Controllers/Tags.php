<?php 
namespace Site\Controllers;

class Tags extends BaseAuth 
{	

	 protected function getModel() 
    {
        $model = new \Site\Models\Tags;
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

    		default:
    			$this->attendeeTapper($tag, $tagid, $role);
    			break;
    	}
    }

    //Attendee Registration, we check to see if the tag is assigned to a user and bring up an new / edit form.
    protected function attendeeRegistration($tag,$tagid,$role) {

    	if(empty($tag->attendee)) {
    		\Base::instance()->reroute('/attendee/create/'.$tag->_id);
    	} else {
    		\Base::instance()->reroute('/attendee/edit/'.$tag->_id);	
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
        $ticketModel = new \Site\Models\Tickets;
        if(empty($tag->ticket)) {

        $ticket = $ticketModel->getPrefab();
        $ticket->tag = array('tagid' => $tag->tagid , "id" => $tag->_id );
        $ticket = $ticketModel->save((array) $ticket);
        $tag->ticket = array( "id" => $ticket->_id, "Status" => $ticket->status);
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
        $this->emptyTag($tag);
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
        echo $view->render('Site/Views::tags/empty.php');
    }

}
?> 