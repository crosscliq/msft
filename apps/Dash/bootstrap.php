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
        $f3->route('GET /events', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /prizes', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /attendees', '\Dash\Controllers\Placeholder->placeholder'); 
        $f3->route('GET /wristbands', '\Dash\Controllers\Placeholder->placeholder'); 



        $f3->route('GET|POST /logout', '\Users\Dash\Controllers\User->logout'); 

    	//$f3->route('GET /login', '\Site\Controllers\Home->display');
        
        // TODO set some app-specific settings, if desired
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Dash/Views/";
        $f3->set('UI', $ui);
        
        // append this app's template folder to the path
        $templates = $f3->get('TEMPLATES');
        $templates .= ";" . $f3->get('PATH_ROOT') . "apps/Dash/Templates/";
        $f3->set('TEMPLATES', $templates);
        
        
        break;
}
?>