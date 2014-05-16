<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);

if(!empty($_COOKIE['id'])) {
session_id($_COOKIE['id']);
}

$app = require('../vendor/bcosca/fatfree/lib/base.php');
//Fix for MS phones sessions getting a blank host
$app->set('HOST', $_SERVER['HTTP_HOST']);

$app->set('PATH_ROOT', __dir__ . '/../');
$app->set('AUTOLOAD',
        $app->get('PATH_ROOT') . 'lib/;' .
        $app->get('PATH_ROOT') . 'apps/;'
);

// common config
$app->config( $app->get('PATH_ROOT') . 'config/common.config.ini');
$app->set('db.mongo.server', $app->get('db.mongo.server') .'/'. $app->get('db.mongo.database'));
require $app->get('PATH_ROOT') . 'vendor/autoload.php';


$app->set('APP_NAME', 'site');
//TODO maybe we query the event model, and get the event object from the main DB and load it. so than we can  let the DB be controlled by the dash
$app->set('subdomain', strtolower(explode(".",$_SERVER['HTTP_HOST'])[0]));
if ($app->get('subdomain') == 'dashboard') {
    $app->set('APP_NAME', 'dash');
}
if ($app->get('subdomain') == 'admin') {
    $app->set('APP_NAME', 'admin');
}
if ($app->get('subdomain') == 'api') {
    $app->set('APP_NAME', 'api');
}

if($app->get('subdomain') != 'api' &&$app->get('subdomain') != 'admin' && $app->get('subdomain') != 'dashboard' && !empty($app->get('subdomain')) ) {
//WE are loading an event
//HERE WE CAN CHECK THIS IT IS A VALID EVENT REGISTERED AND SUCH
$app->set('event.database', $app->get('subdomain'));
$model = new \Dash\Models\Events;
$item = $model->setState('filter.eventid', $app->get('subdomain'))->getItem();
\Dsc\System::instance()->get('session')->set('event', $item);
}

$logger = new \Log( $app->get('application.logfile') );
\Registry::set('logger', $logger);
if ($app->get('DEBUG')) {
    ini_set('display_errors',1);
}
// bootstap each mini-app
\Dsc\Apps::instance()->bootstrap();
// load routes
\Dsc\System::instance()->get('router')->registerRoutes(); 
// trigger the preflight event
\Dsc\System::instance()->preflight();

 $app->route('GET|POST /logout', function() { 
             $reroute = \Base::instance()->get('SESSION.home');
             \Base::instance()->clear('SESSION');
             \Base::instance()->clear('COOKIE');
             setcookie('id','',time()-3600);
             \Base::instance()->reroute($reroute);
        });

 
$app->route('POST /attendees/sync', '\Api\Site\Controllers\Attendees->Sync');    
        

$app->run();

?>
