<?php 
namespace Dash\Models;

class Roles extends \Dsc\Mongo\Collection {
	protected $__collection_name = 'users.roles';
	
	protected $__config = array(
			'default_sort' => array(
					'name' => 1
			),
	);
    
   	/**
   	 * Fetches the conditions for the next query
   	 *
   	 * @return \Dsc\Mongo\Collection
   	 */
   	protected function fetchConditions(){
        $this->filters = array();
    
        $filter_keyword = $this->getState('filter.keyword');
        if ($filter_keyword && is_string($filter_keyword))
        {
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
    
            $where = array();
            $where[] = array('name'=>$key);
    
            $this->setCondition( '$or', $where );
        }
    
        $filter_type = $this->getState('filter.type'); 
        if (strlen($filter_type))
        {
            $this->setCondition( 'type', $filter_type );
        }

        $filter_group = $this->getState('filter.group');     
        if (strlen($filter_group))
        {
            $this->setCondition( 'group', $filter_group );
        }      

        $filter_name_contains = $this->getState('filter.name-contains', null, 'name');
        if (strlen($filter_name_contains))
        {
            $key =  new \MongoRegex('/'. $filter_name_contains .'/i');
            $this->setCondition( 'name', $key );
        }
        
        return parent::fetchConditions();
    }

    /**
     * To remove
    protected function buildOrderClause()
    {
        $order = null;
    
        if ($this->getState('order_clause')) {
            return $this->getState('order_clause');
        }
    
        if ($this->getState('list.order') && in_array($this->getState('list.order'), $this->filter_fields)) {
    
            $direction = '1';
            if ($this->getState('list.direction') && in_array($this->getState('list.direction'), $this->order_directions)) {
                $direction = (int) $this->getState('list.direction');
            }
    
            $order = array( $this->getState('list.order') => $direction);
        }
    
        return $order;
    }
     */
}