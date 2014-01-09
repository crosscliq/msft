<?php 
namespace Site;

class UserListener extends \Prefab 
{
    public function onUserSignup( $event )
    {   

        
        $user = $event->getArgument('user');

        $model = new \Site\Models\Roles;
        $roles = $model->emptyState()->setState('default', '1')->getList();
        $userroles = array();

        foreach($roles as $role) {
            $userroles[] =  array('id' => $role->_id, 'name'=> $role->name, 'type' => $role->type);
        }
         $user->roles = $userroles;   

        $user->save(); 
    }

    public function onBeforeSaveAttendees( $event )
    {   
        var_dump($event);
        die();
    }


}