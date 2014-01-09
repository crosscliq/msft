<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "site":
        // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Site\UserListener::instance());
        

        $f3->config( $f3->get('PATH_ROOT').'apps/Site/config.ini');
        //HEADERS ROUTES, these are so JS can call the headers TODO maybe move to this php logic
        $f3->route('GET /header', '\Site\Controllers\Header->base');
        $f3->route('GET /header-cust', '\Site\Controllers\Header->customer');

        //USERS FRONTEND AUTH ROUTES, creates signup, and login, logout routes        
    	$f3->route('GET /', '\Site\Controllers\Auth->showLogin');
        $f3->route('POST /', '\Site\Controllers\Auth->doLogin');
        $f3->route('GET /login', '\Site\Controllers\Auth->showLogin'); 
        $f3->route('POST /login', '\Site\Controllers\Auth->doLogin');
        $f3->route('GET /signup', '\Site\Controllers\Auth->showSignup');
        $f3->route('POST /signup', '\Site\Controllers\Auth->doSignup');
        $f3->route('GET|POST /logout', '\Users\Site\Controllers\User->logout');     
        $f3->route('GET /roles', '\Site\Controllers\Users->roles');
        $f3->route('GET /active/role/@roleid', '\Site\Controllers\Users->role');
        //Tag Parser
        $f3->route('GET /e/@eventid/@tagid', '\Site\Controllers\Tags->action');

        $f3->route('GET /empty', '\Site\Controllers\Tags->displayEmpty');

        //Attendee Reg pages
        $f3->route('GET /attendee', '\Site\Controllers\Attendees->display');
        $f3->route('GET /attendee/create/@tagid', '\Site\Controllers\Attendee->create');
        $f3->route('POST /attendee/create/@tagid', '\Site\Controllers\Attendee->add');
        $f3->route('GET /attendee/edit/@tagid', '\Site\Controllers\Attendee->edit');
        $f3->route('GET /attendee/customer/@tagid', '\Site\Controllers\Attendee->attendee');
        $f3->route('POST /attendee/customer/update/@id', '\Site\Controllers\Attendee->update');
        $f3->route('GET /attendee/confirm/@id', '\Site\Controllers\Attendee->confirm');
        // TODO set some app-specific settings, if desired
        //Ticketing pages
        $f3->route('GET /ticketing', '\Site\Controllers\Ticketing->display');
        $f3->route('GET /ticketing/create/@tagid', '\Site\Controllers\Ticketing->create');
        $f3->route('POST /ticketing/create/@tagid', '\Site\Controllers\Ticketing->add');
        $f3->route('GET /ticketing/edit/@tagid', '\Site\Controllers\Ticketing->edit');
        $f3->route('GET /ticketing/customer/@tagid', '\Site\Controllers\Ticketing->attendee');
        $f3->route('POST /ticketing/customer/update/@id', '\Site\Controllers\Ticketing->update');
        $f3->route('GET /ticketing/confirm/@id', '\Site\Controllers\Ticketing->confirm');
   

        


        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Site/Views/";
        $f3->set('UI', $ui);
        
        // append this app's template folder to the path
        $templates = $f3->get('TEMPLATES');
        $templates .= ";" . $f3->get('PATH_ROOT') . "apps/Site/Templates/";
        $f3->set('TEMPLATES', $templates);
        
        
        break;
}
?>