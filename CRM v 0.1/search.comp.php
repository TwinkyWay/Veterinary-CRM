<?php
include_once 'file_path.php';

if (isset($_POST['ajax'])&&$_POST['ajax']=='owner') {
	echo json_encode(Owner::search($_POST['str']), JSON_UNESCAPED_UNICODE);
	exit;
}
if (isset($_POST['ajax'])&&$_POST['ajax']=='animal') {
	echo json_encode(Animal::animals_owners($_POST['str']), JSON_UNESCAPED_UNICODE);
	exit;
}
if (isset($_REQUEST['action'])&&$_REQUEST['action']==='find_owner'){
	$find_owner = (trim($_POST['f_name_owner'])!='')?trim($_POST['f_name_owner']):errorMessage('Пустое поле!');
	$owners = Owner::search($find_owner);
	if (!empty($owners)){
		$owners = Animal::owners_animals($owners);
	} else {
		$owners = 'no_found';
	}
}
if (isset($_REQUEST['action'])&&$_REQUEST['action']==='find_animal'){
	$find_animal = (trim($_POST['f_name_animal'])!='')?trim($_POST['f_name_animal']):errorMessage('Пустое поле!');
	$animals = Animal::animals_owners($find_animal);
}