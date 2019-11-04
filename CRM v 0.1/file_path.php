<?php
//$path = $_SERVER['DOCUMENT_ROOT'].'/MVComp/newNameDB';
//$path = dirname(__FILE__);

define('ADD_DIR', '');
///Structure/branches/auth
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'].ADD_DIR.'/');

define('WWW_ROOT', 'http://'.$_SERVER['HTTP_HOST'].ADD_DIR.'/');

define('_CSS', WWW_ROOT.'style/');
define('_SCRIPT', WWW_ROOT.'script/');


include_once PATH_ROOT.'include/error.inc.php';
include_once PATH_ROOT.'include/db_connect.inc.php';

spl_autoload_register(function ($class_name)
{
	require_once PATH_ROOT.'class/'.$class_name.'.php';
});