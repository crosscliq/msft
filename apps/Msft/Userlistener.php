<?php 
namespace Msft;

class Userlistener extends \Prefab 
{
    public function onUserSignup( $event )
    {   
        $user = $event->getArgument('user');
        $model = new \Msft\Models\Roles;
        $roles = $model->emptyState()->setState('filter.group', 'default')->getList();

        if(empty($roles)) {
          $roles = array();  
        }
        $userroles = array();
        foreach($roles as $role) {
            $userroles[] =  array('id' => $role->_id, 'name'=> $role->name, 'type' => $role->type);
        }
        $user->roles = $userroles;   
        $user->save(); 
    }


    public function onAfterSaveMsftModelsAttendees($event) {

        $mapper = $event->getArgument('mapper');

        if(strlen($mapper->phone) > 6 && $mapper->{'offers.sms'} == 'on' && empty($mapper->{'offers.smssubscribed'})) {
         $event = \Dsc\System::instance()->get('session')->get('event');
         var_dump($event);
        var_dump($mapper);
        die();

            $client = new \SoapClient("https://www.cellitstudio.com/internal/webservice.php?wsdl");
           
            $params = array( "userid" => 'msstore_nso', "password" => "msstore_nso", "keyword" => $event->{'sms.keyword'}, "acceptterms" => 1
);              
             $params['phone'] = $mapper->phone;

             $params['datafield_xml'] = '<datafields>
          <datafield id="106794">xyz</datafield> 
          <datafield id="106796">xyz</datafield>
          <datafield id="106792">xyz</datafield>
          <datafield id="106798">abc</datafield>
          </datafields>';
              $response = $client->__soapCall("subscribe", $params);
              
              if($response == 1) {
                $mapper->set('offers.smssubscribed',$response );
                $mapper->save();
              } else {
                //notsure
              }
        }



    }

  


}