<?php
/**
* 
*/
class Owner
{
	private $id;
	function __construct($id)
	{
		$this->id = $id;
	}
	public function info()
	{
		try {
			$sql = "SELECT id, name, address, phone, email FROM owner WHERE id = :id";
			$result = $GLOBALS['pdo']->prepare($sql);
			$result->bindValue(':id',$this->id);
			$result->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при извлечении данных о владельце');
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	public function animal_not_recept($value)
	{
		try {
			$sql = 'SELECT id, name FROM animals WHERE owner_id = :owner_id AND NOT id = :animal_id';
			$resultAnimal = $GLOBALS['pdo']->prepare($sql);
			$resultAnimal->bindValue(':owner_id',$this->id);
			$resultAnimal->bindValue(':animal_id',$value);
			$resultAnimal->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при извлечении данных о питомце вне приёма');
		}
		return $resultAnimal->fetchALL(PDO::FETCH_ASSOC);
	}
	public static function search($value)
	{
		try {
			$sql = "SELECT id, name FROM owner WHERE name LIKE :name";
			$result = $GLOBALS['pdo']->prepare($sql);
			$result->bindValue(':name',$value.'%');
			$result->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при поиске владельца',$e);
		}
		return $result->fetchAll();
	}
	public function animals()
	{
		try {
			$sql = "SELECT * FROM animals WHERE owner_id = :owner_id";
			$result = $GLOBALS['pdo']->prepare($sql);
			$result->bindValue(':owner_id',$this->id);
			$result->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при поиске питомцев владельца');
		}
		$animals = $result->fetchAll();
		foreach ($animals as $key => $animal) {
			$animals[$key]['type_select'] = Type::select($animal['type_id']);
			$animals[$key]['gender_select'] = Gender::select($animal['gender_id']);
		}
		return $animals;
	}
}