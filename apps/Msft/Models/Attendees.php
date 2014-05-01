<?php 
namespace Msft\Models;

class Attendees extends Eventbase 
{
    protected $__collection_name = 'attendees';
        
    protected function fetchConditions()
    {   
    	
        parent::fetchConditions();
       
        $filter_keyword = $this->getState('filter.keyword');
        
        if ($filter_keyword && is_string($filter_keyword))
        {
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
    
            $where = array();
            $where[] = array('name'=>$key);
            $where[] = array('slug'=>$key);
            $where[] = array('event_id'=>$key);
            $where[] = array('start_date'=>$key);
            $where[] = array('end_date'=>$key);
  
    
            $this->setCondition('$or', $where);
        }
    
        $filter_id = $this->getState('filter.id');

        if (strlen($filter_id))
        {
            $this->setCondition('_id', new \MongoId((string) $filter_id));
        }

        $filter_profile_complete = $this->getState('filter.profile.complete');

        if (strlen($filter_profile_complete))
        {   
            $this->setCondition('first_name', array('$ne' => null));
            $this->setCondition('last_name', array('$ne' => null));
            $this->setCondition('phone', array('$ne' => null));
        }

        $filter_yearday = $this->getState('filter.yearday');

        if (strlen($filter_yearday))
        {   
            $this->setCondition('created.yday', $filter_yearday);
        }

        $filter_eventid = $this->getState('filter.eventid');

        if (strlen($filter_eventid))
        {   
            $this->setCondition('eventid', $filter_eventid);
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
             $this->setCondition('offers.sms', 'on');
        }

         $filter_offers_email = $this->getState('filter.offers.email');
        
        if (strlen($filter_offers_email))
        {
            $this->setCondition('offers.email', 'on');
        }
        
     
    
        return $this;
    }

      public function getTotal()
    {
        
        $filters = $this->getFilters();
        $mapper = $this->getMapper();
        $count = $mapper->count($filters);
    
        return $count;
    }

    function getTotalCount() {
        $this->emptyState();
        return $this->getTotal();
    }


        public function prepareItem($item) {
     
	    \Base::instance()->get('gpg');
	     $item->email = $gpg->decrypt($item->email);	
            return $item;

        }


      public function getRandomItem( $refresh=false )
    {
        $filters = $this->getFilters();
        $options = $this->getOptions();
        
        $total = (int) $this->getTotal();
        $skip = rand(0,$total);

        $mapper = $this->getMapper();
        $options['limit'] = 1;
        if($skip !=0 || $skip !=1){
           $options['offset'] = $skip; 
        }
        
        $items = $mapper->find($filters, $options);
        if(@$items[0]){
             $item = $items[0];
            $item = $this->prepareItem($item);

        return $item;
        } else {
            return $items ;
        }
       
        
       
    }

}
?>
