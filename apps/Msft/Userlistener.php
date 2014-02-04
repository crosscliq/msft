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

        if($mapper->phone && $mapper->{'offers.sms'} == 'on' && empty($mapper->{'offers.smssubscribed'})) {
            $client = new \SoapClient("https://www.cellitstudio.com/internal/webservice.php?wsdl");
             $params = array( "userid" => 'msstore_in_app_missa', "password" => "msstore0128", "keyword" => "ms_instore_missa", "acceptterms" => 1
);              
             $params['phone'] = $mapper->phone;
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