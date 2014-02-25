<?php 
namespace Api\Controllers;

class Attendees extends \Dsc\Controller  
{	


	
     public function Sync($f3)
    {

        $body = $f3->get('BODY');

        $object = json_decode($body);
        $object->api = 'apiregister';
        //get the EVENT ID FROM URL
        $f3->set('event.db',explode('.',parse_url( $object->Url, PHP_URL_HOST ))[0]);

        $model = new \Api\Models\Attendees;

        $f3->set('HALT', false) ;
       // $f3->set('DEBUG', 0) ;
        $result = array();



        try {
          $result =   $model->create((array) $object);
            $result['response'] = true;
            $result['msg'] = 'Attendee Saved';
        } catch (\Exception $e) {

            $result['response'] = false;
            $result['msg'] = \Dsc\System::instance()->renderMessages();
            
        } finally {

            echo json_encode($result);
           
        }
         die();
        
      
    }
	
 

}
?> 
