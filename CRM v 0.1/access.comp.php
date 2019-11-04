<?php
include_once 'file_path.php';

session_start();
if (!isset($_SESSION['login'])){
	session_destroy();
	header('Location:'.WWW_ROOT.'access/login.html.php');
}


if (isset($_REQUEST['login'])&&$_REQUEST['login']=='out'){
	session_destroy();
	header('Location:'.WWW_ROOT.'access/login.html.php');
}
if (isset($_REQUEST['good'])) {
	unset($data);
	$script = explode('/', $_SERVER['REQUEST_URI']);
	$num = count($script)-1;
	header("Location: ".WWW_ROOT."profile/{$script[$num]}");
}
if ($_SERVER['REQUEST_URI']=='/control/'&&$_SESSION['doctor']['id']!=4) header('Location:'.WWW_ROOT);

if (empty($_GET)) {
	$no_exit = ['reception', 'profile', 'info'];
	$reg_ex = "|/([\w]*)/|";
	preg_match($reg_ex, $_SERVER['REQUEST_URI'],$url);
	if (!empty($url)&&in_array($url[1], $no_exit)) header('Location:'.WWW_ROOT);
}
?>