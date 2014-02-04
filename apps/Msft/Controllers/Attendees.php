<?php 
namespace Msft\Controllers;

class Attendees extends BaseAuth 
{	

	
     public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('attendee/home.php');
    }

     public function own()
    {
        \Base::instance()->set('pagetitle', 'Welcome');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('attendee/own.php');
    }

    public function soap() {

        $client = new \SoapClient("https://www.cellitstudio.com/internal/webservice.php?wsdl");
       $params = array(
  "userid" => 'msstore_in_app_missa',
  "password" => "msstore0128",
  "phone" => "8017084970",
  "keyword" => "ms_instore_missa",
  "acceptterms" => 1
);

    //   var_dump($client->__getFunctions()); 


       $response = $client->__soapCall("subscribe", $params);
       var_dump($response);
    }

}
?> 