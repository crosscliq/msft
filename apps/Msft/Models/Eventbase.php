<?php 
namespace Msft\Models;

class Eventbase extends \Dsc\Models\Db\Mongo  
{
    protected $db = null; // the db connection object
  
     public function getDb()
    {
        if (empty($this->db))
        {   
            $db_host = \Base::instance()->get('db.mongo.host');
            $db_port = \Base::instance()->get('db.mongo.port');
            $db_name = \Base::instance()->get('event.db');
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