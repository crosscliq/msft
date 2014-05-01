<?php 
namespace Msft\Models;


Class Users Extends \Users\Models\Users {

   

   public function getDb()
    {	
       $db_name = \Base::instance()->get('event.database');
       $db_server = \Base::instance()->get('db.mongo.server');
       return new \MongoDB( new \MongoClient($db_server), $db_name);;
    }

	
}



?>