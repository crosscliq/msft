<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "dash":
         // register event listener
        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Eventlistener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Pusherlistener::instance());


        $f3->config( $f3->get('PATH_ROOT').'apps/Dash/config.ini');

        \Base::instance()->clear('SESSION');
        \Base::instance()->reroute('/');
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