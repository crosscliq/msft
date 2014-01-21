<?php 
namespace Dash\Models\Event;


Class Attendees Extends Eventbase {

    protected $collection = 'attendees';
    protected $default_ordering_direction = '1';
    protected $default_ordering_field = 'type';

    public function __construct($config=array())
    {
        $config['filter_fields'] = array(
            'name', 'start_date', 'end_date'
        );
        $config['order_directions'] = array('1', '-1');
        
        parent::__construct($config);
    }


    public function getPrefab() {
        $prefab = New \Dash\Models\Prefabs\Attendee();
        return $prefab;
    }
    
    protected function fetchFilters()
    {   
       
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
  
    
            $this->filters['$or'] = $where;
        }
    
        $filter_id = $this->getState('filter.id');
        
        if (strlen($filter_id))
        {
            $this->filters['_id'] = new \MongoId((string) $filter_id);
        }

        $filter_tagid = $this->getState('filter.tagid');
        
        if (strlen($filter_tagid))
        {
            $this->filters['tagid'] = $filter_tagid;
        }


        $filter_eventid = $this->getState('filter.eventid');

        if (strlen($filter_eventid))
        {
            $this->filters['eventid'] = $filter_eventid;
        }


        $filter_slug = $this->getState('filter.slug');

        if (strlen($filter_slug))
        {
            $this->filters['slug'] = $filter_slug;
        }

        
      /*  $filter_username_contains = $this->getState('filter.username-contains', null, 'username');
        if (strlen($filter_username_contains))
        {
            $key =  new \MongoRegex('/'. $filter_username_contains .'/i');
            $this->filters['username'] = $key;
        }
        
        $filter_email_contains = $this->getState('filter.email-contains');
        if (strlen($filter_email_contains))
        {
            $key =  new \MongoRegex('/'. $filter_email_contains .'/i');
            $this->filters['email'] = $key;
        }
       

        $filter_password = $this->getState('filter.password');
        if (strlen($filter_password))
        {
            $this->filters['password'] = $filter_password;
        }

        $filter_group = $this->getState('filter.group');

        if (strlen($filter_group))
        {
            $this->filters['groups.id'] = new \MongoId((string) $filter_group);
        }*/
    
        return $this->filters;
    }


        public function prepareItem($item) {
           
            $item->tickets = $this->hydrateTickets($item->tagid);

            return $item;

        }


    function hydrateTickets($tagid) {

        $model = new \Dash\Models\Event\Tickets;
        $model->setState('filter.tag.id',$tagid);
        $tickets = $model->getList();

        foreach ($tickets as $key => $ticket) {
            $ticket = $ticket->cast();
        }

        if(empty( $tickets)){
            $tickets = array();
        }

        return $tickets;



    }



       public function getList( $refresh=false )
    {
        $fields = $this->getFields();
        $filters = $this->getFilters();
        $options = $this->getOptions();
    
        $mapper = $this->getMapper();
        if (!empty($fields) && method_exists($mapper, 'select')) 
        {
            if (is_a($mapper, '\DB\Mongo\Mapper')) {
                $items = $mapper->select($fields, $filters, $options);
            } else {
                $f3 = \Base::instance();
                $items = $mapper->select($f3->csv($fields), $filters, $options);
            }            
        }
        else 
        {
            $items = $mapper->find($filters, $options);
        }                
        //TODO make the foreach conditional to avoid unneed preformance hog
        if($items) {
         
            foreach ($items as $key => $item) {
                $item = $this->prepareItem($item);
            }
        }
        
        return $items;
    }
    
    public function getItem( $refresh=false )
    {
        $filters = $this->getFilters();
        $options = $this->getOptions();
    
        $mapper = $this->getMapper();
        $item = $mapper->findone($filters, $options);
        
        //TODO make this conditional to avoid unneed preformance hog
        $item = $this->prepareItem($item);

        return $item;
    }

     /**
     *
     * @return unknown
     */
    public function paginate()
    {
        $filters = $this->getFilters();
        $options = $this->getOptions();
        $pos = $this->getState('list.offset', 0, 'int');
        $size = $this->getState('list.limit', 10, 'int');
    
        $pagination = $this->getMapper()->paginate($pos, $size, $filters, $options);
        
        //todo make this conditional
        foreach ($pagination['subset'] as $key => $item) {
        
        $item = $this->prepareItem($item);
        }
       


        return $pagination;
    }

}

?>