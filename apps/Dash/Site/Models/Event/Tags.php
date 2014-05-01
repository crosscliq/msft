<?php 
namespace Dash\Site\Models\Event;

class Tags extends Eventbase 
{
   /**
     * Default Document Structure
     * @var unknown
     */

    public $_id;
    public $tagid;
    public $type;
    public $actions = array();
    public $attendee = array();
    public $ticket = array();
    public $eventhistory = array();
    public $event;
    
    protected $__collection_name = 'tags';
    
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

        $filter_tagid = $this->getState('filter.tagid');
        
        if (strlen($filter_tagid))
        {
            $this->setCondition('tagid', $filter_tagid);
        }


        $filter_eventid = $this->getState('filter.eventid');

        if (strlen($filter_eventid))
        {
            $this->setCondition('eventid', $filter_eventid);
        }


        $filter_slug = $this->getState('filter.slug');

        if (strlen($filter_slug))
        {
            $this->setCondition('slug', $filter_slug);
        }
    
        return $this;
    }

     function getTotalCount() {
        $this->emptyState();
        return $this->getTotal();
    }

    function withTicketsOnly() {
        $this->emptyState();
        $this->setState('filter.no.attendee', '1');
        $this->setState('filter.has.ticket', '1');
        return $this->getTotal();
    }

    function withAttendeesOnly() {
        $this->emptyState();
        $this->setState('filter.has.attendee', '1');
        $this->setState('filter.no.ticket', '1');
        return $this->getTotal();
    }

    function withAttendeesAndTickets() {
        $this->emptyState();
        $this->setState('filter.has.attendee', '1');
        $this->setState('filter.has.ticket', '1');
        return $this->getTotal();
    }

    function withNOAttendeesAndTickets() {
        $this->emptyState();
        $this->setState('filter.no.attendee', '1');
        $this->setState('filter.no.ticket', '1');
        return $this->getTotal();
    }


    /*
    public function create( $values, $options=array() ) 
    { 
        
        $save =  $this->save( $values, $options );
        if($save) {
            $activity = new \Rystband\Models\Activity;
            $activity->create(array('type'=> 'wristband', 'action' => 'activated', 'object' => $save->cast()));
        }
        return $save;


    }
    */

    /*
    public function update( $mapper, $values, $options=array() )
    {   
        $save =  $this->save( $values, $options, $mapper );
     
        if($save) {
            $activity = new \Rystband\Models\Activity;
            $activity->create(array('type'=> 'wristband', 'action' => 'update', 'object' => $save->cast(), 'updated' =>  $values ));
        }

        return $save;
   
    } 
    */

}

?>
