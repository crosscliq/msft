<?php
//phpinfo();
$app = require('../vendor/bcosca/fatfree/lib/base.php');

$app->set('PATH_ROOT', __dir__ . '/../');
$app->set('AUTOLOAD',
        $app->get('PATH_ROOT') . 'lib/;' .
        $app->get('PATH_ROOT') . 'apps/;'
);

require $app->get('PATH_ROOT') . 'vendor/autoload.php';

$app->set('APP_NAME', 'site');
//TODO maybe we query the event model, and get the event object from the main DB and load it. so than we can  let the DB be controlled by the dash
$app->set('event.db', explode(".",$_SERVER['HTTP_HOST'])[0]);

if ($app->get('event.db') == 'dashboard') {
    $app->set('APP_NAME', 'dash');
    $app->set('event.db', 'msft');
}
if ($app->get('event.db') == 'admin') {
    $app->set('APP_NAME', 'admin');
     $app->set('event.db', 'msft');
}
if (empty($app->get('event.db'))) {
    $app->set('event.db', 'msft');
}
// common config
$app->config( $app->get('PATH_ROOT') . 'config/common.config.ini');

$logger = new \Log( $app->get('application.logfile') );
\Registry::set('logger', $logger);

if ($app->get('DEBUG')) {
    ini_set('display_errors',1);
}
// bootstap each mini-app
$custom = $app->get('PATH_ROOT').'apps/Custom/';

\Dsc\Apps::instance()->bootstrap(null, array($custom ));

\Dsc\System::instance()->preflight();
//$db = new \DB\Mongo('mongodb://localhost:27017', $app->get('event.db'));
//new \DB\Mongo\Session($db);

$app->run();

?>
