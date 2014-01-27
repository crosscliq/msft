<?php 
namespace Msft\Models;


Class Users Extends \Users\Admin\Models\Users {


	protected function createDb()
    {
        $db_name = \Base::instance()->get('event.db');
    
        $this->db = new \DB\Mongo('mongodb://localhost:27017', $db_name);
        
        return $this;
    }

	
}



?>