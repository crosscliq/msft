<?php 
namespace Api\Models;

class Attendees extends \Msft\Models\Attendees 
{
    public function getDb()
    {	
       $db_name = \Base::instance()->get('event.database');

       $db_server = \Base::instance()->get('db.mongo.base').'/'.$db_name;
     
       return new \MongoDB( new \MongoClient($db_server), $db_name);;
    }
  
}
?>