<?php

/**
* 
*/
class Animal extends Gender
{
	/*public $id;
	function __construct($id)
	{
		$this->id = $id;
	}*/
	public static function info($value)
	{
		try {
			$sql = "SELECT id,name,gender_id,breed, birthday bd
					FROM animals 
					WHERE id = {$value}";
			$result = $GLOBALS['pdo']->query($sql);
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при поиске животного');
		}
		$animalInfo = $result->fetch(PDO::FETCH_ASSOC);
		$animalInfo['genderName'] = parent::name($animalInfo['gender_id']);
		$animalInfo['age'] = floor((time()-strtotime($animalInfo['bd']))/31536000);
		return $animalInfo;
	}
	public static function owners_animals($arr)
	{
		foreach ($arr as $key => $value) {
			try {
				$sql = "SELECT id, name, gender_id, breed
						FROM animals WHERE owner_id = {$value['id']}";
				$result = $GLOBALS['pdo']->query($sql);
			} catch (PDOException $e) {
				errorMesSQL('Ошибка при поиске животного');
			}
			$arr[$key]['animal'] = $result->fetchAll();
		}
		return $arr;
	}
	public static function animals_owners($name)
	{
		try {
			$sql = 'SELECT id,name,gender_id,breed, birthday bd, owner_id, type_id
					FROM animals 
					WHERE name LIKE :name';
			$result = $GLOBALS['pdo']->prepare($sql);
			$result->bindValue(':name', $name.'%');
			$result->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при поиске животного',$e);
		}
		$animalInfo = $result->fetchAll(PDO::FETCH_ASSOC);
		foreach ($animalInfo as $key => $animal) {
			$animalInfo[$key]['genderName'] = parent::name($animal['gender_id']);
			$animalInfo[$key]['age'] = floor((time()-strtotime($animal['bd']))/31536000);
			$animalInfo[$key]['type_name'] = Type::name($animal['type_id']);
			//return $animalInfo;
			$ow = new Owner($animal['owner_id']);
			$owner = $ow->info();
			$animalInfo[$key]['owner_id'] = $owner['id'];
			$animalInfo[$key]['owner_name'] = $owner['name'];
		}
		return $animalInfo;
	}
}