<?php 
namespace Msft\Models;

class Eventbase extends \Dsc\Models\Db\Mongo  
{
    protected $db = null; // the db connection object
    
    public function getDb()
    {
        if (empty($this->db))
        {
            $db_name = \Base::instance()->get('event.db');
            $this->db = new \DB\Mongo('mongodb://localhost:27017', $db_name);
        }
    
        return $this->db;
    }

    


}
?>