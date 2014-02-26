<?php 
namespace Msft\Models;


Class Users Extends \Users\Admin\Models\Users {

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

    /**
     * An alias for the save command
     * 
     * @param unknown_type $values
     * @param unknown_type $options
     */
    public function create( $values, $options=array() ) 
    { 
        $values['email'] = strtolower($values['email']);
        $values['created'] = \Dsc\Mongo\Metastamp::getDate('now');
        $save =  $this->save( $values, $options );
        if($save) {
            $activity = new \Msft\Models\Activity;
            $activity->create(array('type'=> 'user', 'action' => 'created', 'object' => $save->cast()));
        }
        return $save;


    }

      /**
     * An alias for the save command
     * 
     * @param unknown_type $mapper
     * @param unknown_type $values
     * @param unknown_type $options
     */
    public function update( $mapper, $values, $options=array() )
    {   
        $values['email'] = strtolower($values['email']);
        $save =  $this->save( $values, $options, $mapper );
     
        if($save) {
            $activity = new \Msft\Models\Activity;
            $activity->create(array('type'=> 'user', 'action' => 'update', 'object' => $save->cast(), 'updated' =>  $values ));
        }

        return $save;
   
    }

	
}



?>