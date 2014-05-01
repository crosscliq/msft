<?php

class MsftBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Msft';

    protected function runSite()
    {    
        $f3 = \Base::instance();
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Userlistener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Pusherlistener::instance());
       
        //\Dsc\System::instance()->get('router')->mount( new \Msft\Site\Routes\Bands, $this->namespace );
       
        $f3->route('GET|POST /logout', function() { 
             $reroute = \Base::instance()->get('SESSION.home');
             \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
             setcookie('id','',time()-3600);
             \Base::instance()->reroute($reroute);
        });

       
        $f3->route('GET /soap', '\Msft\Site\Controllers\Attendees->soap'); 
        //USERS FRONTEND AUTH ROUTES, creates signup, and login, logout routes
        $f3->route('GET /', function($f3) {
           $f3->reroute('/welcome');
        });
       
        $f3->route('GET /home', '\Msft\Site\Controllers\Auth->showLogin');
        $f3->route('POST /home', '\Msft\Site\Controllers\Auth->doLogin');     
        
     
        $f3->route('GET /signup', '\Msft\Site\Controllers\Auth->showSignup');
        $f3->route('POST /signup', '\Msft\Site\Controllers\Auth->doSignup');
        $f3->route('GET|POST /logout', '\Users\Msft\Site\Controllers\User->logout');     
        $f3->route('GET /roles', '\Msft\Site\Controllers\Users->roles');
        $f3->route('GET /active/role/@roleid', '\Msft\Site\Controllers\Users->role');
        //Tag Parser
        $f3->route('GET|POST /band/@tagid', '\Msft\Site\Controllers\Tags->action');
        $f3->route('GET /band/@tagid/selfsignup', '\Msft\Site\Controllers\Selfregister->selfsignin');
        $f3->route('POST /band/@tagid/selfsignup', '\Msft\Site\Controllers\Selfregister->add');
        $f3->route('GET /band/@id/registerconfirm', '\Msft\Site\Controllers\Selfregister->registerconfirm');
        $f3->route('GET /band/@tagid/alreadyregistered', '\Msft\Site\Controllers\Selfregister->alreadyregistered');
        $f3->route('GET /empty', '\Msft\Site\Controllers\Tags->displayEmpty');



         $f3->route('POST /self/assign/tag/@tagid', '\Msft\Site\Controllers\Selfregister->assign');
        $f3->route('GET /self/signin/@tagid', '\Msft\Site\Controllers\Selfregister->signin');
        
        //Attendee Reg pages
        $f3->route('GET /attendee', '\Msft\Site\Controllers\Attendees->display');
        $f3->route('POST /attendee/assign/tag/@tagid', '\Msft\Site\Controllers\Attendee->assign');
        $f3->route('GET /attendee/signin/@tagid', '\Msft\Site\Controllers\Attendee->signin');
        $f3->route('GET /attendee/create/@tagid', '\Msft\Site\Controllers\Attendee->create');
        $f3->route('POST /attendee/create/@tagid', '\Msft\Site\Controllers\Attendee->add');
        $f3->route('GET /attendee/edit/@id', '\Msft\Site\Controllers\Attendee->edit');
        $f3->route('GET /attendee/customer/@id', '\Msft\Site\Controllers\Attendee->attendee');
        $f3->route('POST /attendee/customer/update/@id', '\Msft\Site\Controllers\Attendee->update');
        $f3->route('GET /attendee/confirm/@id', '\Msft\Site\Controllers\Attendee->confirm');
        // TODO set some app-specific settings, if desired
        //Ticketing pages
        $f3->route('GET /ticketing', '\Msft\Site\Controllers\Ticketing->display');
        $f3->route('GET /ticketing/create/@id', '\Msft\Site\Controllers\Ticketing->create');
        $f3->route('POST /ticketing/create/@id', '\Msft\Site\Controllers\Ticketing->add');
        $f3->route('GET /ticketing/edit/@id', '\Msft\Site\Controllers\Ticketing->edit');
        $f3->route('GET /ticketing/confirm/@id', '\Msft\Site\Controllers\Ticketing->confirm');

         //Transfer pages
        $f3->route('GET /transfer', '\Msft\Site\Controllers\Transfer->home');
        $f3->route('GET /transfer/origin/@id', '\Msft\Site\Controllers\Transfer->origin');
        $f3->route('GET /transfer/destination/@tagid', '\Msft\Site\Controllers\Transfer->destination');
        $f3->route('GET /transfer/notempty/@tagid', '\Msft\Site\Controllers\Transfer->notempty');
        $f3->route('GET /transfer/empty/@tagid', '\Msft\Site\Controllers\Transfer->isempty');


         //Meet greet Reg pages
        $f3->route('GET /meetgreet', '\Msft\Site\Controllers\Meetgreets->display');
        $f3->route('GET /meetgreet/create/@tagid', '\Msft\Site\Controllers\Meetgreet->create');
        $f3->route('POST /meetgreet/create/@tagid', '\Msft\Site\Controllers\Meetgreet->add');
        $f3->route('GET /meetgreet/edit/@id', '\Msft\Site\Controllers\Meetgreet->edit');
        $f3->route('GET /meetgreet/customer/@tagid', '\Msft\Site\Controllers\Meetgreet->meetgreet');
        $f3->route('POST /meetgreet/customer/update/@id', '\Msft\Site\Controllers\Meetgreet->update');
        $f3->route('GET /meetgreet/confirm/@id', '\Msft\Site\Controllers\Meetgreet->confirm');
        
          //Meet greet Reg pages
        $f3->route('GET /gatekeeper', '\Msft\Site\Controllers\Gatekeeper->display');
        $f3->route('GET /gatekeeper/ticket/ok/@ticketid', '\Msft\Site\Controllers\Gatekeeper->ok');
        $f3->route('GET /gatekeeper/ticket/bad/@ticketid', '\Msft\Site\Controllers\Gatekeeper->bad');
       

        $f3->route('GET /mc', '\Msft\Site\Controllers\Mc->display');

        $f3->route('GET /games/raffle', '\Msft\Site\Controllers\Games\Raffle->display');
        $f3->route('POST /games/raffle/play', '\Msft\Site\Controllers\Games\Raffle->play');
        $f3->route('GET /games/raffle/winners', '\Msft\Site\Controllers\Games\Raffle->winners');
        $f3->route('GET /games/raffle/nomorewinners', '\Msft\Site\Controllers\Games\Raffle->nomorewinners');
        $f3->route('GET /prizepatrol', '\Msft\Site\Controllers\Prizepatrol->display');

        $f3->route('GET /privacy/policy', '\Msft\Site\Controllers\Privacy->display');
        
        $f3->route('GET|POST /logout', function() {
             \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
             setcookie('id','',time()-3600);
             \Base::instance()->reroute('/');
        });          
        
        $f3->route('GET /welcome', '\Msft\Site\Controllers\Home->own');
            
    
        parent::runSite();
    }



}

$app = new MsftBootstrap();

?>
