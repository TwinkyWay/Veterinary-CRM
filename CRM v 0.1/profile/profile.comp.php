<?php
//include_once 'file_path.php';
if (isset($_REQUEST['idOwner'])) {
	$ow = new Owner($_REQUEST['idOwner']);
	$owner = $ow->info();
	$animals = $ow->animals();
}
if (isset($_REQUEST['action'])&&$_REQUEST['action']==='editOwner') {
	$data = null;
	$placeholder = [
				':id' => $_REQUEST['idOwner'],
				':name' => $_REQUEST['name'],
				':address' => $_REQUEST['address'],
				':phone' => $_REQUEST['phone'],
				':email' => $_REQUEST['email']
			];
	try {
		$sql = 'UPDATE owner 
				SET 	name = :name,
						address =:address,
						phone =:phone,
						email=:email
				WHERE `id`= :id';
		$u = $pdo->prepare($sql);
		$u->execute($placeholder);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при обновлении инфо о владельце');
	}
	$data = 'Данные владельца обновлены';
}

if (isset($_REQUEST['action'])&&$_REQUEST['action']=='addAnimal') {
	$data = null;
	$placeholder = [
		':idOwner' => $_REQUEST['idOwner'],
		':animalName' => $_REQUEST['animal_name'],
		':gender' => $_REQUEST['gender'],
		':type' => $_REQUEST['animal_type'],
		':breed' => $_REQUEST['animal_breed'],
		':bd' => $_REQUEST['animal_bd'],
		':color' => $_REQUEST['animal_color'],
		':weigth' => (empty($_REQUEST['animal_weigth']))?0:$_REQUEST['animal_weigth'],
		':stigma' => (empty($_REQUEST['animal_stigma']))?0:$_REQUEST['animal_stigma'],
		':chip' => (empty($_REQUEST['animal_chip']))?0:$_REQUEST['animal_chip'],
	];
	try {
		$sql = 'INSERT INTO `animals`(`name`, `gender_id`, `breed`, `birthday`, `color`, `weigth`, `stigma`, `chip`, `type_id`, `owner_id`) VALUES (:animalName,:gender,:breed,:bd,:color,:weigth,:stigma,:chip,:type,:idOwner)';
		$i = $pdo->prepare($sql);
		$i->execute($placeholder);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при добавлении питомца', $e);
	}
	$data = 'Новый питомец добавлен успешно';
	//header("Location: $pathURL/profile.html.php?{$_SERVER['QUERY_STRING']}");
	//exit;
}
if (isset($_REQUEST['action'])&&$_REQUEST['action']=='editAnimal') {
	$data = null;
	$placeholder = [
		':idAnimal' => $_REQUEST['idAnimal'],
		':animalName' => $_REQUEST['animal_name'],
		':gender' => $_REQUEST['gender'],
		':type' => $_REQUEST['animal_type'],
		':breed' => $_REQUEST['animal_breed'],
		':bd' => $_REQUEST['animal_bd'],
		':color' => $_REQUEST['animal_color'],
		':weigth' => $_REQUEST['animal_weigth'],
		':stigma' => $_REQUEST['animal_stigma'],
		':chip' => $_REQUEST['animal_chip'],
	];
	try {
		$sql = 'UPDATE `animals` 
				SET 	`name` = :animalName,
						`gender_id` = :gender,
						`breed` = :breed,
						`birthday` = :bd,
						`color` = :color,
						`weigth` = :weigth,
						`stigma` = :stigma,
						`chip` = :chip,
						`type_id` = :type
				WHERE `id` = :idAnimal';
		$i = $pdo->prepare($sql);
		$i->execute($placeholder);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при обновлении инфо о питомце');
	}
	$data = 'Данные о питомеце обновлены';
	//header("Location: $pathURL/profile.html.php?{$_SERVER['QUERY_STRING']}");
	//exit;
}
/*
if (isset($_REQUEST['good'])) {
	unset($data);
	header("Location: $pathURL/profile.html.php?{$_SERVER['QUERY_STRING']}");
}
*/