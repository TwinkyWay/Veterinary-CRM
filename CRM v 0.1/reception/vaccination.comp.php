<?php
//include_once 'file_path.php';
//
try {
	$sql = 'SELECT `date`, `text` FROM `vaccination` WHERE `animal_id` = :id ORDER BY `date` DESC , id DESC LIMIT 1';
	$result = $pdo->prepare($sql);
	$result->bindValue(':id',$animalInfo['id']);
	$result->execute();
} catch (PDOException $e) {
	errorMesSQL('Ошибка поиска последней вакцинации');
}
$vac_date = $result->fetch(PDO::FETCH_ASSOC);

if (isset($_REQUEST['action'])&&$_REQUEST['action']=='add_vac') {
	$data = null;
	$placeholder = [
		':id' => $_REQUEST['vac_idAnimal'],
		':text' => $_REQUEST['vac_text'],
		':date' => $_REQUEST['vac_date'],
	];
	try {
		$sql = 'INSERT INTO `vaccination`(`animal_id`, `date`, `text`) 
				VALUES (:id, :date, :text)';
		$i = $pdo->prepare($sql);
		$i->execute($placeholder);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при добавлении вакцинации');
	}
	$data = 'Вакцинация добавлена';
}

//require_once 'succes_action.php';