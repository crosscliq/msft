<?php 
namespace Msft\Models;

class Roles extends Eventbase 
{
   protected $__collection_name = 'users.roles';
    
    protected function fetchConditions()
    {   
        $filter_keyword = $this->getState('filter.keyword');
        if ($filter_keyword && is_string($filter_keyword))
        {
            $key =  new \MongoRegex('/'. $filter_keyword .'/i');
    
            $where = array();
            $where[] = array('name'=>$key);
           // $where[] = array('email'=>$key);
           // $where[] = array('first_name'=>$key);
           // $where[] = array('last_name'=>$key);
    
             $this->setCondition('$or', $where);
        }
    
        $filter_id = $this->getState('filter.id');
        
        if (strlen($filter_id))
        {
            $this->setCondition('_id', new \MongoId((string) $filter_id));
        }

        $filter_type = $this->getState('filter.type'); 

        if (strlen($filter_type))
        {   
            $this->setCondition('type', $filter_type);
          
        }
        $filter_group = $this->getState('filter.group');     
        if (strlen($filter_group))
        {   
            $this->setCondition('group', $filter_group);
        }      

        $filter_name_contains = $this->getState('filter.name-contains', null, 'name');
        if (strlen($filter_name_contains))
        {   
            $key =  new \MongoRegex('/'. $filter_name_contains .'/i');
            $this->setCondition('name', $key);

        }
        
    
            return $this;
    }
    
}