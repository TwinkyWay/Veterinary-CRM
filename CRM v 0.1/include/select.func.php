<?php
/**
* 
*/



/*
function selectGender($value=0, $name)
{	
	if (isset($name)) {
		try {
			$sql = "SELECT name FROM animal_gender WHERE id = $name";
			$r = $GLOBALS['pdo']->query($sql);
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при извлечении пола питомца');
		}
		return $r->fetchColumn();
	}
	try {
		$sql = 'SELECT id, name FROM animal_gender';
		$r = $GLOBALS['pdo']->query($sql);
	} catch (PDOException $e) {
		errorMessage('Ошибка при извлечении пола питомца');
	}
	foreach ($r as $row) {
		 $array[] = [
				'id' => $row['id'],
				'name' => $row['name'],
				'selected' => $row['id']==$value
					];
	}
	return $array;
}
*//*
function selectType($value=0)
{
	try {
		$sql = 'SELECT * FROM `types_animals`';
		$r = $GLOBALS['pdo']->query($sql);
	} catch (PDOException $e) {
		errorMessage('Ошибка при извлечении вида питомца');
	}
	foreach ($r as $row) {
		 $array[] = [
				'id' => $row['id'],
				'name' => $row['name'],
				'selected' => $row['id']==$value
					];
	}
	return $array;
}
/*
function selectDoctor($value=0)
{
	try {
		$sql = 'SELECT * FROM `doctor`';
		$r = $GLOBALS['pdo']->query($sql);
	} catch (PDOException $e) {
		errorMesSQL('Ошибка при извлечении докторов');
	}
	foreach ($r as $row) {
		 $array[] = [
				'id' => $row['id'],
				'name' => $row['name'],
				'selected' => $row['id']==$value
					];
	}
	return $array;
}*/