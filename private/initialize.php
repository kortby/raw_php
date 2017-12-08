<?php 
// output Buffering is On
ob_start();

// path for url
define("WWW_ROOT", 'http://php.local:8888/public');



// file path
define("PRIVATE_PATH", dirname(__file__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));

define("PUBLIC_PATH", PROJECT_PATH.'/public');
define("SHARED_PATH", PRIVATE_PATH.'/shared');

require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

$db = db_connect();
$errors = [];


 ?>