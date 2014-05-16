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

    function formatPhoneNumber($s) {
$rx = "/
    (1)?\D*     # optional country code
    (\d{3})?\D* # optional area code
    (\d{3})\D*  # first three
    (\d{4})     # last four
    (?:\D+|$)   # extension delimiter or EOL
    (\d*)       # optional extension
/x";
preg_match($rx, $s, $matches);
if(!isset($matches[0])) return false;

$country = $matches[1];
$area = $matches[2];
$three = $matches[3];
$four = $matches[4];
$ext = $matches[5];

$out = "$three$four";
if(!empty($area)) $out = "$area$out";
//if(!empty($country)) $out = "+$country$out";
//if(!empty($ext)) $out .= "x$ext";

// check that no digits were truncated
// if (preg_replace('/\D/', '', $s) != preg_replace('/\D/', '', $out)) return false;
return $out;
}
    

    public function doSMSsub($model) {

       if(strlen($model->phone) > 6 && $model->{'offers.sms'} == 'on' && empty($model->{'smssubscribed'})) {
         $event = \Dsc\System::instance()->get('session')->get('event');
	
            $client = new \SoapClient("https://www.cellitstudio.com/internal/webservice.php?wsdl");
           
             $xml = '<datafields>';
             $xml .= '<datafield id="106794">'.@$model->first_name.'</datafield>'; //First Name
             $xml .= '<datafield id="106796">'.@$model->last_name.'</datafield>'; //Last Name
             $xml .= '<datafield id="106792">'.@$model->zipcode.'</datafield>'; //Zip Code
             $xml .= '<datafield id="106798">'.@$model->gender.'</datafield>'; //Gender
	     $xml .= '</datafields>';	
   
     
        $response = $client->subscribe_with_datafields('msstore_nso', 'msstore_nso',$this->formatPhoneNumber($model->phone),  $event->{'sms.keyword'}, 1, $xml);      
	

$model->set('smsdebug',$response );
               

          $model->save();

              if($response == 1) {
                $model->set('smssubscribed',$response);
                $model->save();
              } else {
                //notsure
              }
          /*       $response = $client->subscribe('msstore_nso', 'msstore_nso', $event->{'sms.keyword'}, 1, $model->phone, '<datafields>
          <datafield id="106794">xyz</datafield> 
          <datafield id="106796">xyz</datafield>
          <datafield id="106792">xyz</datafield>
          <datafield id="106798">abc</datafield>
          </datafields>'); */
        }
    }

   

    public function afterCreateMsftModelsAttendees($event) {
        $model = $event->getArgument('model');
        $this->doSMSsub($model);
       
    }

     public function afterCreateApiModelsAttendees($event) {
        
        $model = $event->getArgument('model');
         $this->doSMSsub($model);
     
     }


  


}
