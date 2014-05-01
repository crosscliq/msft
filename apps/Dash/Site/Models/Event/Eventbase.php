<?php 
namespace Dash\Site\Models\Event;

class Eventbase extends  \Dsc\Mongo\Collection     
{
    protected $db = null; // the db connection object
    protected $eventid = null;

   public function getDb()
    {   
       $db_name = \Base::instance()->get('PARAMS.eventid');
       \Base::instance()->set('db.mongo.server',\Base::instance()->get('db.mongo.base').'/'.$db_name);
       $db_server = \Base::instance()->get('db.mongo.server');

       return new \MongoDB( new \MongoClient($db_server), $db_name);;
    }

 

      public function getTotal()
    {
        
        return $this->collection()->count( $this->conditions() );
        
    }
    
}
?>