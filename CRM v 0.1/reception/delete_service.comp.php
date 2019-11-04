<?php
if (isset($_POST['ajax'])&&$_POST['ajax']=='delete'){
	include_once '../file_path.php';
	$reception = new Reception($_POST['recept']);
	if ($reception->delete_service($_POST['code'])){
		echo "Услуга удалена!";
	}
}