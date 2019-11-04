<?php
//include_once 'file_path.php';

if (isset($_REQUEST['action'])&&$_REQUEST['action']==='addOwner') {
	$ownerName = $_REQUEST['name'];
	$ownerAddress = $_REQUEST['address'];
	$ownerPhone = $_REQUEST['phone'];
	$ownerEmail = $_REQUEST['email'];
	try {
		$sql = 'INSERT INTO owner set 
						name = :name,
						address =:address,
						phone =:phone,
						email=:email';
		$i = $pdo->prepare($sql);
		$i->bindValue(':name', $ownerName);
		$i->bindValue(':address', $ownerAddress);
		$i->bindValue(':phone', $ownerPhone);
		$i->bindValue(':email', $ownerEmail);
		$i->execute();
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при добавлении нового клиента');
	}
	$lastId = $pdo->lastInsertId();
	header("Location: ../profile/?idOwner={$lastId}");
}