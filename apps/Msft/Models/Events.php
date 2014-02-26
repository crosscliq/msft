<?php 
namespace Msft\Models;


Class Events Extends \Dsc\Models\Db\Mongo; {

    public function getDb()
    {
        if (empty($this->db))
        {   

            if(empty($f3->get('eventid'))) {
                $f3->set('eventid', $f3->get('PARAMS.eventid'));
            }

            $db_host = \Base::instance()->get('db.mongo.host');
            $db_port = \Base::instance()->get('db.mongo.port');
            $db_name = \Base::instance()->get('db.mongo.name');
            $db_user = \Base::instance()->get('db.mongo.user');
            $db_pass = \Base::instance()->get('db.mongo.password');

            $string = 'mongodb://';
            if( $db_user && $db_pass) {
                $string .= $db_user.':'.$db_pass ."@";
            }
             $string .= $db_host;
             $string .= ':'.$db_port;
             $string .= '/'.$db_name;

            $this->db = new \DB\Mongo($string, $db_name);
        }
    
        return $this->db;
    }

	
}



?>