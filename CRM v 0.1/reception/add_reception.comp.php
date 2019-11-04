<?php

if (isset($_POST['price'])) {
	include_once '../file_path.php';
	$sql = "SELECT `code_id`, `name`, `price` FROM `price` WHERE";
	if (is_numeric($_POST['price'])) {
		$sql .=  " `code_id` LIKE '{$_REQUEST['price']}%'";
	} else {
		$sql .= " `name` LIKE '%{$_REQUEST['price']}%'";
	}
	try {
		
		$result = $GLOBALS['pdo']->query($sql);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при получении прайса');
	}

	if (isset($_REQUEST['select'])){
		$price = $result ->fetch();
		echo json_encode($price, JSON_UNESCAPED_UNICODE);
		exit;
	}
	$price = $result ->fetchALL();
	echo json_encode($price, JSON_UNESCAPED_UNICODE);
	exit;
}
//include_once '../file_path.php';

$doc_name = '';
$date_recept = $date_illness = date("Y-m-d");
$text1 = '';
$text2 = '';
$text3 = '';
$text4 = '';
$text5 = '';
$text6 = '';
$order_info['cons_desc'] = null;
$order_info['cons_price'] = null;

if (isset($_GET['recept'])){
	$recept = new Reception($_GET['recept']);
	$order_info = $recept->get_order();
	$rec = $recept->all_info();
	$date_recept = $rec['date_reception'];
	$date_illness = $rec['date_illness'];
	$text1 = $rec['text1'];
	$text2 = $rec['text2'];
	$text3 = $rec['text3'];
	$text4 = $rec['text4'];
	$text5 = $rec['text5'];
	$text6 = $rec['text6'];
	$edit_reception = $_SESSION['doctor']['id']===$rec['doc_id'];
}


if (isset($_POST['action'])&&$_POST['action']=='add_reception') {
	$data = 'Данные добавлены';
	$placeholder = [
		':text1' => trim($_POST['text1']),
		':text2' => trim($_POST['text2']),
		':date_recept' => $_POST['date_recept'],
		':date_illness' => $_POST['date_illness'],
		':idAnim' => $_POST['idAnimal'],
		':idDoc' => $_SESSION['doctor']['id'],
		':text3' => trim($_POST['text3']),
		':text4' => trim($_POST['text4']),
		':text5' => trim($_POST['text5']),
		':text6' => trim($_POST['text6']),
		':cons_desc' => trim($_POST['cons_desc']),
		':cons_price' => empty($_POST['cons_price'])?0:$_POST['cons_price'],
	];
	$services = isset($_POST['code_id'])?$_POST['code_id']:null;
	$recept_id = Reception::add($placeholder,$services);
	if (is_numeric($recept_id)) {
		$next = true;
		$edit_reception = true;
	} else {
		$data = 'Не добавлены';
	}

}
if (isset($_POST['action'])&&$_POST['action']=='edit_reception') {
	$data = null;
	$placeholder = [
		':id' => $_GET['recept'],
		':text1' => trim($_POST['text1']),
		':text2' => trim($_POST['text2']),
		':text3' => trim($_POST['text3']),
		':text4' => trim($_POST['text4']),
		':text5' => trim($_POST['text5']),
		':text6' => trim($_POST['text6']),
		':cons_desc' => trim($_POST['cons_desc']),
		':cons_price' => empty($_POST['cons_price'])?0:$_POST['cons_price'],
	];
	$services = isset($_POST['code_id'])?$_POST['code_id']:null;
	if (Reception::edit($placeholder,$services)) {
		$data = 'Данные обновлены';
		$next = 2;
	}
	
}

