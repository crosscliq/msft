<?php 
namespace Api\Controllers;

class Attendees extends \Dsc\Controller  
{	

	
     public function Sync($f3)
    {

        $body = $f3->get('BODY');

        $object = json_decode($body);

        //get the EVENT ID FROM URL
        $f3->set('event.db',explode('.',parse_url( $object->Url, PHP_URL_HOST ))[0]);

        $model = new \Api\Models\Attendees;

        $model->create( $object, array('append' => true) );
        
        $result = array('response' => true, 'msg' => 'Attendee Saved');
        echo json_encode($result);
        exit();

    }
	
 

}
?> 
