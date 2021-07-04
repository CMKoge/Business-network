<?php
# Development Mode
ini_set('error_reporting', E_ALL);
# Production Mode
# ini_set('display_errors', 'Off');

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', dirname(__DIR__));
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

session_start();

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'db' => 'business_network',
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800,
  ),
  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token'
  ),
);
// Class Files
spl_autoload_register(function($class) {
  require_once LIB_PATH.DS.'classes'.DS.$class.'.php';
});

// General Files
require_once LIB_PATH.DS.'functions.php';
require_once LIB_PATH.DS.'general_link.php';
require LIB_PATH.DS.'vendor'.DS.'autoload.php';

// Cookie check
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
  $hash = Cookie::get(Config::get('remember/cookie_name'));
  $hashCheck = Database::getInstance()->get('user_session', array('hash', '=', $hash));
  if ($hashCheck->count()) {

    $user = new User($hashCheck->first()->user_id);
    $user->login();
  }
}



 ?>
