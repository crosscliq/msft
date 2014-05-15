<?php 
namespace Api\Models;

class Attendees extends \Msft\Models\Attendees 
{
    public function getDb()
    {   
       $db_name = \Base::instance()->get('PARAMS.eventid');
       \Base::instance()->set('db.mongo.server',\Base::instance()->get('db.mongo.server').'/'.$db_name);
       $db_server = \Base::instance()->get('db.mongo.server');
       return new \MongoDB( new \MongoClient($db_server), $db_name);;
    }
}
?>