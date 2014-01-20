<?php 
namespace Dash;

class Eventlistener extends \Prefab 
{
   
    public function onAfterSaveDashModelsEvents( $event )
    {   
        $mapper = $event->getArgument('mapper');
     
        
        $this->addDefaultRoles($mapper->event_id);
        
        return $event;
    }


    protected function addDefaultRoles($eventid, $event_type = null) {
        $roles = array();
        $model = new \Dash\Models\Roles;
        $roles = $model->emptyState()->getList();
        \Base::instance()->set('event.db', $eventid);

        foreach ( $roles as $key => $role) {
         $newrole = (array) $role->cast();
         unset($newrole['_id']);
         $model = new \Dash\Models\Event\Roles;
         $model->create($newrole); 
        }   
    }

}