<?php 
namespace Dash;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($mapper = $event->getArgument('mapper')) 
        {
        	$mapper->reset();
        	$mapper->priority = 30;
            $mapper->id = 'fa-customer';
        	$mapper->title = 'Customers';
        	$mapper->route = '';
        	$mapper->icon = 'fa fa-tasks';
        	$mapper->children = array(
        			json_decode(json_encode(array( 'title'=>'List', 'route'=>'/admin/customers', 'icon'=>'fa fa-list' )))
                    

        	);
        	$mapper->save();
        	
        	\Dsc\System::instance()->addMessage('Customers added its admin menu items.');
        }
        
    }
}