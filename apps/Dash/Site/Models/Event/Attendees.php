<?php 
namespace Dash\Site\Models\Event;


Class Attendees Extends Eventbase {

    public $_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $zipcode;
    public $products;
    public $offers;
    public $social;
    public $tagid;
    public $created;

    use \Dsc\Traits\Models\Encryptable;
    
    protected $__collection_name = 'attendees';
    
    protected $__config = array(
    		'encrypted_fields' => array(
    				'zipcode', 'phone', 'email', 'first_name', 'last_name'
    		)
    );
        
    protected function fetchConditions()
    {   
        parent::fetchConditions();
       
        $filter_keyword = $this->getState('filter.keyword');
        if ($filter_keyword && is_string($filter_keyword))
        {
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
            $key_encrypt = new \MongoRegex('/'. $this->encryptTextMongo( $filter_keyword ) .'/i');
            
            $where = array();
            $where[] = array('slug'=>$key);
            $where[] = array('event_id'=>$key);
            $where[] = array('start_date'=>$key);
            $where[] = array('end_date'=>$key);
            $where[] = array('email'=>$key_encrypt);
            $where[] = array('zipcode'=>$key_encrypt);
            $where[] = array('last_name'=>$key_encrypt);
            $where[] = array('first_name'=>$key_encrypt);
            
            
            $this->setCondition('$or', $where);
            
        }
    

        $filter_tagid = $this->getState('filter.tagid');
        
        if (strlen($filter_tagid))
        {
            $this->setCondition('tagid', $filter_tagid);
        }


        $filter_profile_complete = $this->getState('filter.profile.complete');

        if (strlen($filter_profile_complete))
        {   $this->setCondition('first_name',array('$ne' => null));
            $this->setCondition('last_name',array('$ne' => null));
            $this->setCondition('phone',array('$ne' => null));
        }


        $filter_eventid = $this->getState('events.id');

        if (strlen($filter_eventid))
        {  
         $this->setCondition('events.id', new \MongoId((string) $filter_eventid));   
        }

        $filter_ticket_id = $this->getState('filter.ticket_id');

        if (strlen($filter_ticket_id))
        {
            $this->setCondition('ticket.id', $filter_ticket_id);
        }

        $filter_slug = $this->getState('filter.slug');

        if (strlen($filter_slug))
        {
            $this->setCondition('slug', $filter_slug);
        }

         $filter_first_name = $this->getState('filter.first_name');

        if (strlen($filter_first_name))
        {
            $this->setCondition('first_name', $filter_first_name);
        }

        $filter_last_name = $this->getState('filter.last_name');

        if (strlen($filter_last_name))
        {
            $this->setCondition('last_name', $filter_last_name);
        }

        $filter_phone = $this->getState('filter.phone');

        if (strlen($filter_phone))
        {
            $this->setCondition('phone', $filter_phone);
        }

        $filter_email = $this->getState('filter.email');

        if (strlen($filter_email))
        {
            $this->setCondition('email', $filter_email);
        }

        $filter_offers_sms = $this->getState('filter.offers.sms');
        
        if (strlen($filter_offers_sms))
        {
         $this->setCondition('offers.sms', (string) 'on');
        }

         $filter_offers_email = $this->getState('filter.offers.email');
        
        if (strlen($filter_offers_email))
        {
         $this->setCondition('offers.email', 'on');
        }

     
    
        return $this;
    }


        public function prepareItem($item) {
           
            $item->tickets = $this->hydrateTickets($item->tagid);

            return $item;

        }


    function hydrateTickets($tagid) {

      /*  $model = new \Dash\Site\Models\Event\Tickets;
        $model->setState('filter.tag.id',$tagid);
        $tickets = $model->getList();
        if(empty( $tickets)){
                    $tickets = array();
                }
        	else {
                foreach ($tickets as $key => $ticket) {
                    $ticket = $ticket->cast();
                }
        }

        return $tickets;*/



    }

    function getTotalCount() {
        $this->emptyState();
        return $this->getTotal();
    }

}

?>
