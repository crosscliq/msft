<?php 
namespace Dash\Models;


Class Events extends \Dsc\Mongo\Collection {

	protected $__collection_name = 'events';
	
	protected $__config = array(
			'default_sort' => array(
					'type' => 1
			),
	);

   	/**
   	 * Fetches the conditions for the next query
   	 *
   	 * @return \Dsc\Mongo\Collection
   	 */
   	protected function fetchConditions(){
        
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
  
    
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
            $this->setCondition('$or', $where);
        }
    
        $filter_id = $this->getState('filter.id');
        
        $filter_eventid = $this->getState('filter.eventid');
        if (strlen($filter_eventid))
        {
            $this->setCondition('event_id', $filter_eventid);
        }


        $filter_slug = $this->getState('filter.slug');

        if (strlen($filter_slug))
        {
            $this->setCondition('slug', $filter_slug);
        }

        return $this;
         
      
    }

    //if all checks pass lets process values
    public function processEventID($event_id){
	    $id = str_replace(' ', '', $event_id);
	    $id = strtolower($id);
	    return $id;
    }

    protected function beforeValidate()
    {
    	if(!empty($this->{'event_id'})){
    		$this->setError('Event ID is required, it is used as the collection name and as the sub domain');
    	} else {
	    	$this->{'event_id'} = $this->processEventID($this->{'event_id'});
    	}

    	return parent::beforeValidate();
    }
}

?>
