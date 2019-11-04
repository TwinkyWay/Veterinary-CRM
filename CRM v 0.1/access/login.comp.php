<?php
require_once '../file_path.php';

$doctors = Doctor::all();
if (isset($_POST['login'])&&$_POST['login']=='in') {
	if (Doctor::auth($_POST['doc_id'],$_POST['pass'])){
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['doctor'] = $doctors[$_POST['doc_id']-1];
		header('Location:'.WWW_ROOT);
		exit;
	} else {
		$error_auth = true;
	}
}