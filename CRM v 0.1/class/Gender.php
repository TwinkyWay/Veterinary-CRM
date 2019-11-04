<?php

class Gender
{
	public static function select($value=0){
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
	public static function name($id){
		try {
			$sql = 'SELECT name FROM animal_gender WHERE id = :id';
			//$r = $GLOBALS['pdo']->query($sql);
			$r = $GLOBALS['pdo']->prepare($sql);
			$r->bindValue(':id',$id);
			$r->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при извлечении пола питомца',$e);
		}
		return $r->fetchColumn();
	}
}