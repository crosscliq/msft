<?php 
namespace Api\Site\Controllers;

class Attendees extends \Dsc\Controller  
{	

/*{
  "UUID": "9e1ab126-0835-4cbd-ae1a-4e79172988d3",
  "Url": "http://ontario.msft.cc/band/onice50",
  "StaffNumber": "abc",
  "first_name": "Test",
  "last_name": "Test",
  "email": "test234@test.com",
  "phone": "2580",
  "zipcode": "4567",
  "products": {
    "xboxone": "on",
    "xbox360": "on",
    "kinect": "on",
    "surface": "on",
    "pc": "on",
    "windowsphone": "on",
    "office": "on"
  },
  "howdidyouhear": "Newspaper",
  "offers": {
    "email": "on",
    "sms": "on"
  },
  "RegisterDate": "2014-02-27T10:40:29.136137-07:00"
}*/


	
     public function Sync($f3)
    {

        $body = $f3->get('BODY');

        $object = json_decode($body);

        $object->api = 'apiregister';
        //get the EVENT ID FROM URL
        $f3->set('event.db',explode('.',parse_url( $object->Url, PHP_URL_HOST ))[0]);

        

        $url = parse_url($object->Url);
        
        $tagModel = new \Msft\Models\Tags;
        $tag = $tagModel->getPrefab();
        $peices = explode('/', $url['path']);
        $tag->tagid = end($peices);
        $tag->eventid = $f3->get('event.db');
        $newTag = $tagModel->create((array) $tag);
        
        $object->tagid = (string) $newTag->_id;
        $object->created = \Dsc\Mongo\Metastamp::getDate('now');
        
        $f3->set('HALT', false) ;
       // $f3->set('DEBUG', 0) ;
        $result = array();
        $model = new \Api\Models\Attendees;
        try {
          $attendee = $model->create((array) $object);
            $result['response'] = true;
            $result['msg'] = 'Attendee Saved';
        } catch (\Exception $e) {

            $result['response'] = false;
            $result['msg'] = \Dsc\System::instance()->renderMessages();
            
        } finally {
            echo json_encode($result);  

                $newTag->set('attendee.id',$attendee->_id);
                $newTag->set('attendee.name',$attendee->first_name . ' ' .$attendee->last_name);
                $newTag->save();
        }
         die();
        
      
    }
	
 

}
?> 