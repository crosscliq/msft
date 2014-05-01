<?php 
namespace Dash\Models;

Class Users Extends \Users\Admin\Models\Users {
    
    protected function beforeValidate()
    {
    	if( strlen( $this->{'email'} ) ){
    		$this->{'email'} = strtolower( $this->{'email'} );
    	}

        if ( !empty( $this->roles ) ) 
        {
            $roles = array();
            foreach ( $this->roles as $key => $id) 
            {
                $item = (new \Dash\Models\Event\Roles)->setState('filter.id', $id)->getItem();
                $roles[] = array("id" =>  $item->id, "name" => $item->name, "type" => $item->type );
            }
            $this->roles = $roles;
        }      
    	
        return parent::beforeValidate();
    }
}



?>