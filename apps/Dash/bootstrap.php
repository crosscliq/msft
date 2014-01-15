<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "dash":
        
        $f3->config( $f3->get('PATH_ROOT').'apps/Dash/config.ini');

    	$f3->route('GET /', '\Dash\Controllers\Dashboard->display');

        $f3->route('GET /login', '\Dash\Controllers\Auth->showLogin'); 
        $f3->route('POST /login', '\Dash\Controllers\Auth->doLogin');
        //$f3->route('GET /signup', '\Dash\Controllers\Auth->showSignup');
        //$f3->route('POST /signup', '\Dash\Controllers\Auth->doSignup');
        $f3->route('GET /admins', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /users', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /prizes', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /attendees', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /wristbands', '\Dash\Controllers\Placeholder->placeholder'); 
        // EVENT ROUTES
        $f3->route('GET|POST /events', '\Dash\Controllers\Events->display');
        $f3->route('GET|POST /events/page/@page', '\Dash\Controllers\Events->display');
        $f3->route('GET|POST /events/delete', '\Dash\Controllers\Events->delete');
        $f3->route('GET /event/create', '\Dash\Controllers\Event->create');
        $f3->route('POST /event/add', '\Dash\Controllers\Event->add');
        $f3->route('GET /event/read/@id', '\Dash\Controllers\Event->read');
        $f3->route('GET /event/edit/@id', '\Dash\Controllers\Event->edit');
        $f3->route('POST /event/edit/@id', '\Dash\Controllers\Event->update');
        $f3->route('DELETE /event/edit/@id', '\Dash\Controllers\Event->delete');
        $f3->route('GET /event/delete/@id', '\Dash\Controllers\Event->delete');  

        $f3->route('GET|POST /@eventid/dashboard', '\Dash\Controllers\Event\Event->display');    
        // EVENT ATTENDEES ROUTES
        $f3->route('GET|POST /@eventid/attendees', '\Dash\Controllers\Event\Attendees->display');
        $f3->route('GET|POST /@eventid/attendees/page/@page', '\Dash\Controllers\Event\Attendees->display');
        $f3->route('GET|POST /@eventid/attendees/delete', '\Dash\Controllers\Event\Attendees->delete');
        $f3->route('GET /@eventid/attendee/create', '\Dash\Controllers\Event\Attendee->create');
        $f3->route('GET /@eventid/attendee/read/@id', '\Dash\Controllers\Event\Attendee->add');
        $f3->route('GET /@eventid/attendee/edit/@id', '\Dash\Controllers\Event\Attendee->edit');
        $f3->route('POST /@eventid/attendee/update/@id', '\Dash\Controllers\Event\Attendee->update');
        // EVENT WRISTBANDS ROUTES
        $f3->route('GET|POST /@eventid/wristbands', '\Dash\Controllers\Event\Wristbands->display');
        $f3->route('GET|POST /@eventid/wristbands/page/@page', '\Dash\Controllers\Event\Wristbands->display');
        $f3->route('GET|POST /@eventid/wristbands/delete', '\Dash\Controllers\Event\Wristbands->delete');
        $f3->route('GET /@eventid/wristband/create', '\Dash\Controllers\Event\Wristband->create');
        $f3->route('GET /@eventid/wristband/read/@id', '\Dash\Controllers\Event\Wristband->add');
        $f3->route('GET /@eventid/wristband/edit/@id', '\Dash\Controllers\Event\Wristband->edit');
        $f3->route('POST /@eventid/wristband/update/@id', '\Dash\Controllers\Event\Wristband->update');
        // EVENT WRISTBANDS ROUTES
        $f3->route('GET|POST /@eventid/prizes', '\Dash\Controllers\Event\Prizes->display');
        $f3->route('GET|POST /@eventid/prizes/page/@page', '\Dash\Controllers\Event\Prizes->display');
        $f3->route('GET|POST /@eventid/prizes/delete', '\Dash\Controllers\Event\Prizes->delete');
        $f3->route('GET /@eventid/prize/create', '\Dash\Controllers\Event\Prize->create');
        $f3->route('GET /@eventid/prize/read/@id', '\Dash\Controllers\Event\Prize->add');
        $f3->route('GET /@eventid/prize/edit/@id', '\Dash\Controllers\Event\Prize->edit');
        $f3->route('POST /@eventid/prize/update/@id', '\Dash\Controllers\Event\Prize->update');


        $f3->route('GET|POST /users', '\Dash\Controllers\Users->display');
        $f3->route('GET|POST /users/@page', '\Dash\Controllers\Users->display');
        $f3->route('GET|POST /users/delete', '\Dash\Controllers\Users->delete');
        $f3->route('GET /user', '\Dash\Controllers\User->create');
        $f3->route('POST /user', '\Dash\Controllers\User->add');
        $f3->route('GET /user/@id', '\Dash\Controllers\User->read');
        $f3->route('GET /user/@id/edit', '\Dash\Controllers\User->edit');
        $f3->route('POST /user/@id', '\Dash\Controllers\User->update');
        $f3->route('DELETE /user/@id', '\Dash\Controllers\User->delete');
        $f3->route('GET /user/@id/delete', '\Dash\Controllers\User->delete');    
        
         $f3->route('GET|POST /logout', '\Dash\Controllers\Auth->logout');  
        // TODO set some app-specific settings, if desired
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Dash/Views/";
        $f3->set('UI', $ui);
        
        // append this app's template folder to the path
        $templates = $f3->get('TEMPLATES');
        $templates .= ";" . $f3->get('PATH_ROOT') . "apps/Dash/Templates/";
        $f3->set('TEMPLATES', $templates);
        

        \Modules\Factory::registerPositions( array('nav', 'footer', 'above-content', 'below-content') );
        
        \Modules\Factory::registerPath( $f3->get('PATH_ROOT') . "apps/Dash/Modules/" );
        break;

         case "admin":
          \Modules\Factory::registerPositions( array('nav', 'footer', 'above-content', 'below-content') );
          \Modules\Factory::registerPath( $f3->get('PATH_ROOT') . "apps/Dash/Modules/" );
         break;
}
?>