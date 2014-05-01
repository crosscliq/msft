<?php 
namespace Msft\Models;

class Eventbase extends \Dsc\Mongo\Collection  
{
    
	public function getDb()
    {	
       $db_name = \Base::instance()->get('event.database');
       
       \Base::instance()->set('db.mongo.server',\Base::instance()->get('db.mongo.server').'/'.$db_name);
       $db_server = \Base::instance()->get('db.mongo.server');
       return new \MongoDB( new \MongoClient($db_server), $db_name);;
    }
}
?>