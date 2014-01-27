<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "site":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\UserListener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Msft\PusherListener::instance());
        //fixing a view bug where I shouldn't call my app Site
        
        //
        $f3->config( $f3->get('PATH_ROOT').'apps/Msft/config.ini');
        //HEADERS ROUTES, these are so JS can call the headers TODO maybe move to this php logic
        $f3->route('GET /header', '\Msft\Controllers\Header->base');
        $f3->route('GET /header-cust', '\Msft\Controllers\Header->customer');

        //USERS FRONTEND AUTH ROUTES, creates signup, and login, logout routes        
    	$f3->route('GET /', '\Msft\Controllers\Auth->showLogin');
        $f3->route('POST /', '\Msft\Controllers\Auth->doLogin');
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
        $f3->route('GET /attendee/customer/@tagid', '\Msft\Controllers\Attendee->attendee');
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

         //Meet greet Reg pages
        $f3->route('GET /meetgreet', '\Msft\Controllers\Meetgreets->display');
        $f3->route('GET /meetgreet/create/@tagid', '\Msft\Controllers\Meetgreet->create');
        $f3->route('POST /meetgreet/create/@tagid', '\Msft\Controllers\Meetgreet->add');
        $f3->route('GET /meetgreet/edit/@id', '\Msft\Controllers\Meetgreet->edit');
        $f3->route('GET /meetgreet/customer/@tagid', '\Msft\Controllers\Meetgreet->meetgreet');
        $f3->route('POST /meetgreet/customer/update/@id', '\Msft\Controllers\Meetgreet->update');
        $f3->route('GET /meetgreet/confirm/@id', '\Msft\Controllers\Meetgreet->confirm');
        

        $f3->route('GET /prizepatrol', '\Msft\Controllers\Prizepatrol->display');

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
        
            
        break;
}
?>
