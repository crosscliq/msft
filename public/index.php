<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);

if(!empty($_COOKIE['id'])) {
session_id($_COOKIE['id']);
}


$app = require('../vendor/bcosca/fatfree/lib/base.php');

$CONFIG = array();
$CONFIG['gnupg_home'] = '/var/www/.gnupg';
$CONFIG['gnupg_fingerprint'] = 'C613 8CE7 665D 23AA DB9F  E82E 8E14 BE57 9513 0BE8';

$gpg = new gnupg();
putenv("GNUPGHOME={$CONFIG['gnupg_home']}");
$gpg->seterrormode(GNUPG_ERROR_SILENT);
$gpg->addencryptkey('C613 8CE7 665D 23AA DB9F  E82E 8E14 BE57 9513 0BE8');
$gpg->adddecryptkey('C613 8CE7 665D 23AA DB9F  E82E 8E14 BE57 9513 0BE8', 'F0rgetting01');
$app->set('gpg', $gpg);

// Then use something like this to decrypt the data.
//$passphrase = 'F0rgetting01';
//$gpg->adddecryptkey('C613 8CE7 665D 23AA DB9F  E82E 8E14 BE57 9513 0BE8', $passphrase);
//$decrypted = $gpg->decrypt($encrypted);

//echo "Decrypted text: $decrypted";





$app->set('PATH_ROOT', __dir__ . '/../');
$app->set('AUTOLOAD',
        $app->get('PATH_ROOT') . 'lib/;' .
        $app->get('PATH_ROOT') . 'apps/;'
);
// common config
$app->config( $app->get('PATH_ROOT') . 'config/common.config.ini');

require $app->get('PATH_ROOT') . 'vendor/autoload.php';

$app->set('APP_NAME', 'site');
//TODO maybe we query the event model, and get the event object from the main DB and load it. so than we can  let the DB be controlled by the dash
$app->set('event.db', strtolower(explode(".",$_SERVER['HTTP_HOST'])[0]));
if ($app->get('event.db') == 'dashboard') {
    $app->set('APP_NAME', 'dash');
}
if ($app->get('event.db') == 'admin') {
    $app->set('APP_NAME', 'admin');
}
if ($app->get('event.db') == 'api') {
    $app->set('APP_NAME', 'api');
    $app->set('event.db', 'msft');
}

if($app->get('event.db') != 'api' &&$app->get('event.db') != 'admin' && $app->get('event.db') != 'dashboard' && !empty($app->get('event.db')) ) {
//WE are loading an event
//HERE WE CAN CHECK THIS IT IS A VALID EVENT REGISTERED AND SUCH
$model = new \Dash\Models\Events;
$item = $model->setState('filter.eventid', $app->get('event.db'))->getItem();
$app->set('SESSION.event', $item );

}

if (empty($app->get('event.db'))) {
    $app->set('event.db', 'msft');
}

$logger = new \Log( $app->get('application.logfile') );
\Registry::set('logger', $logger);

if ($app->get('DEBUG')) {
    ini_set('display_errors',1);
}
// bootstap each mini-app
$custom = $app->get('PATH_ROOT').'apps/Custom/';

\Dsc\Apps::instance()->bootstrap(null, array($custom ));

\Dsc\System::instance()->preflight();


$app->run();

?>
