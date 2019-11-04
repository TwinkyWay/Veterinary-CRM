<?php
/**
* 
*/
class Type
{

	public static function select($value=0)
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
	public static function name($id)
	{
		try {
			$sql = 'SELECT name FROM `types_animals` WHERE id = :id';
			$r = $GLOBALS['pdo']->prepare($sql);
			$r->bindValue(':id',$id);
			$r->execute();
		} catch (PDOException $e) {
			errorMessage('Ошибка при извлечении названия вида питомца',$e);
		}
		return $r->fetchColumn();
	}
}