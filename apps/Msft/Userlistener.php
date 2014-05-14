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


    public function afterCreateMsftModelsAttendees($event) {

        $model = $event->getArgument('model');

        if(strlen($model->phone) > 6 && $model->{'offers.sms'} == 'on' && empty($model->{'offers.smssubscribed'})) {
         $event = \Dsc\System::instance()->get('session')->get('event');
        

            $client = new \SoapClient("https://www.cellitstudio.com/internal/webservice.php?wsdl");
           
            $params = array( "userid" => 'msstore_nso', "password" => "msstore_nso", "keyword" => $event->{'sms.keyword'}, "acceptterms" => 1);              
             $params['phone'] = $model->phone;

             $params['datafield_xml'] = '<datafields>
          <datafield id="106794">xyz</datafield> 
          <datafield id="106796">xyz</datafield>
          <datafield id="106792">xyz</datafield>
          <datafield id="106798">abc</datafield>
          </datafields>';
            $response = $client->__soapCall("subscribe", $params);
        /*       $response = $client->subscribe('msstore_nso', 'msstore_nso', $event->{'sms.keyword'}, 1, $model->phone, '<datafields>
          <datafield id="106794">xyz</datafield> 
          <datafield id="106796">xyz</datafield>
          <datafield id="106792">xyz</datafield>
          <datafield id="106798">abc</datafield>
          </datafields>'); */
              $model->set('smsdebug',$response );
                $model->save();

              if($response == 1) {
                $model->set('offers.smssubscribed',$response );
                $model->save();
              } else {
                //notsure
              }
        }



    }

  


}