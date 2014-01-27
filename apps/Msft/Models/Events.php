<?php 
namespace Msft\Models;


Class Events Extends \Dsc\Models\Db\Mongo; {


	protected function createDb()
    {
        $db_name = \Base::instance()->get('db.mongo.name');
        $this->db = new \DB\Mongo('mongodb://localhost:27017', $db_name);
        
        return $this;
    }

	
}



?>