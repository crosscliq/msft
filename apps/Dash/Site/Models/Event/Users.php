<?php 
namespace Dash\Site\Models\Event;


Class Users Extends \Users\Models\Users {

      public function getDb()
    {   
       $db_name = \Base::instance()->get('PARAMS.eventid');
       $db_server = \Base::instance()->get('db.mongo.base').'/'.$db_name;
       return new \MongoDB( new \MongoClient($db_server), $db_name);
    }


    
    protected function beforeSave()
    {
       $f3 = \Base::instance();

        $events = array();

        if (!empty($this->roles)) 
        {
            $groups = array();
            foreach ($this->roles as $key => $id) 
            {
                $item = (new \Dash\Site\Models\Event\Roles)->setState('filter.id', $id)->getItem();
                $roles[] = array("id" =>  $item->id, "name" => $item->name);
        
            }
            $this->roles = $roles;
        }    
    
        
        return parent::beforeSave();
    }

}