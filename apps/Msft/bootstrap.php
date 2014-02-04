<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "site":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Userlistener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\Pusherlistener::instance());
        //fixing a view bug where I shouldn't call my app Site
        
        //
        $f3->config( $f3->get('PATH_ROOT').'apps/Msft/config.ini');
        //HEADERS ROUTES, these are so JS can call the headers TODO maybe move to this php logic
        $f3->route('GET /header', '\Msft\Controllers\Header->base');
        $f3->route('GET /header-cust', '\Msft\Controllers\Header->customer');

        $f3->route('GET /soap', '\Msft\Controllers\Attendees->soap'); 
        //USERS FRONTEND AUTH ROUTES, creates signup, and login, logout routes
        $f3->route('GET /', function($f3) {
           $f3->reroute('/welcome');
        });
       
        $f3->route('GET /home', '\Msft\Controllers\Auth->showLogin');
        $f3->route('POST /home', '\Msft\Controllers\Auth->doLogin');     
    	
        $f3->route('GET /login', '\Msft\Controllers\Auth->showLogin'); 
        $f3->route('POST /login', '\Msft\Controllers\Auth->doLogin');
        $f3->route('GET /signup', '\Msft\Controllers\Auth->showSignup');
        $f3->route('POST /signup', '\Msft\Controllers\Auth->doSignup');
        $f3->route('GET|POST /logout', '\Users\Msft\Controllers\User->logout');     
        $f3->route('GET /roles', '\Msft\Controllers\Users->roles');
        $f3->route('GET /active/role/@roleid', '\Msft\Controllers\Users->role');
        //Tag Parser
        $f3->route('GET /band/@tagid', '\Msft\Controllers\Tags->action');

        $f3->route('GET /empty', '\Msft\Controllers\Tags->displayEmpty');

        //Attendee Reg pages
        $f3->route('GET /attendee', '\Msft\Controllers\Attendees->display');
        $f3->route('POST /attendee/assign/tag/@tagid', '\Msft\Controllers\Attendee->assign');
        $f3->route('GET /attendee/signin/@tagid', '\Msft\Controllers\Attendee->signin');
        $f3->route('GET /attendee/create/@tagid', '\Msft\Controllers\Attendee->create');
        $f3->route('POST /attendee/create/@tagid', '\Msft\Controllers\Attendee->add');
        $f3->route('GET /attendee/edit/@id', '\Msft\Controllers\Attendee->edit');
        $f3->route('GET /attendee/customer/@id', '\Msft\Controllers\Attendee->attendee');
        $f3->route('POST /attendee/customer/update/@id', '\Msft\Controllers\Attendee->update');
        $f3->route('GET /attendee/confirm/@id', '\Msft\Controllers\Attendee->confirm');
        // TODO set some app-specific settings, if desired
        //Ticketing pages
        $f3->route('GET /ticketing', '\Msft\Controllers\Ticketing->display');
        $f3->route('GET /ticketing/create/@id', '\Msft\Controllers\Ticketing->create');
        $f3->route('POST /ticketing/create/@id', '\Msft\Controllers\Ticketing->add');
        $f3->route('GET /ticketing/edit/@id', '\Msft\Controllers\Ticketing->edit');
        $f3->route('GET /ticketing/confirm/@id', '\Msft\Controllers\Ticketing->confirm');

         //Transfer pages
        $f3->route('GET /transfer', '\Msft\Controllers\Transfer->home');
        $f3->route('GET /transfer/origin/@id', '\Msft\Controllers\Transfer->origin');
        $f3->route('GET /transfer/destination/@tagid', '\Msft\Controllers\Transfer->destination');
        $f3->route('GET /transfer/notempty/@tagid', '\Msft\Controllers\Transfer->notempty');
        $f3->route('GET /transfer/empty/@tagid', '\Msft\Controllers\Transfer->isempty');


         //Meet greet Reg pages
        $f3->route('GET /meetgreet', '\Msft\Controllers\Meetgreets->display');
        $f3->route('GET /meetgreet/create/@tagid', '\Msft\Controllers\Meetgreet->create');
        $f3->route('POST /meetgreet/create/@tagid', '\Msft\Controllers\Meetgreet->add');
        $f3->route('GET /meetgreet/edit/@id', '\Msft\Controllers\Meetgreet->edit');
        $f3->route('GET /meetgreet/customer/@tagid', '\Msft\Controllers\Meetgreet->meetgreet');
        $f3->route('POST /meetgreet/customer/update/@id', '\Msft\Controllers\Meetgreet->update');
        $f3->route('GET /meetgreet/confirm/@id', '\Msft\Controllers\Meetgreet->confirm');
        
          //Meet greet Reg pages
        $f3->route('GET /gatekeeper', '\Msft\Controllers\Gatekeeper->display');
        $f3->route('GET /gatekeeper/ticket/ok/@ticketid', '\Msft\Controllers\Gatekeeper->ok');
        $f3->route('GET /gatekeeper/ticket/bad/@ticketid', '\Msft\Controllers\Gatekeeper->bad');
       

        $f3->route('GET /mc', '\Msft\Controllers\Mc->display');

        $f3->route('GET /games/raffle', '\Msft\Controllers\Games\Raffle->display');
        $f3->route('POST /games/raffle/play', '\Msft\Controllers\Games\Raffle->play');
        $f3->route('GET /games/raffle/winners', '\Msft\Controllers\Games\Raffle->winners');
        $f3->route('GET /games/raffle/nomorewinners', '\Msft\Controllers\Games\Raffle->nomorewinners');
        $f3->route('GET /prizepatrol', '\Msft\Controllers\Prizepatrol->display');

        $f3->route('GET /privacy/policy', '\Msft\Controllers\Privacy->display');
        
	    $f3->route('GET|POST /logout', function() {
            \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
	        setcookie('id','',time()-3600);
	         \Base::instance()->reroute('/');
        });          
        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Msft/Views/";
        $f3->set('UI', $ui);

	$f3->route('GET /welcome', '\Msft\Controllers\Attendees->own');
            
        break;
}
?>
