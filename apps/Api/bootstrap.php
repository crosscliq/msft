<?php

class ApiBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Api';

    protected function runApi()
    {    
        $f3 = \Base::instance();
        
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Userlistener::instance());

        //$f3->route('POST /attendees/sync', '\Api\Site\Controllers\Attendees->Sync');    
        
        /*$f3->route('GET /', function () {

            echo ' The only method Allowed is POST, and you have to post to valid routes valid data';
        });  */
    }



}

$app = new ApiBootstrap();

?>