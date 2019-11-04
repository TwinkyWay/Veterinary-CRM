<?php

/**
* 
*/
class Doctor
{
	public function add($post)
	{
		$placeholder = [
			':name' => $post['name'],
			':email' => $post['email'],
			':phone' => $post['phone'],
			':id' => $post['doctor_id']
		];
		$sql = 'UPDATE `doctor` SET `name`= :name, `email`=:email,`phone`=:phone';
		if (!empty($post['pass'])){
			$sql.= ', password = :pass';
			$placeholder[':pass'] = md5($post['pass'].'vet');
		}
		$sql.= ' WHERE id = :id';
		try {
			$u = $GLOBALS['pdo']->prepare($sql);
			$u->execute($placeholder);
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при обновлении инфо', $e);
		}
		return true;
	}
	public function all_info()
	{
		try {
			$s = $GLOBALS['pdo']->query('SELECT * FROM doctor');
		} catch (PDOException $e) {
			errorMesSQL('Ошибка получения списка докторов');
		}
		return $s->fetchALL(PDO::FETCH_ASSOC);
	}

	public static function all()
	{
		try {
			$s = $GLOBALS['pdo']->query('SELECT id, name FROM doctor');
		} catch (PDOException $e) {
			errorMesSQL('Ошибка получения списка докторов');
		}
		return $s->fetchALL(PDO::FETCH_ASSOC);
	}
	public static function info($id)
	{
		try {
			$s = $GLOBALS['pdo']->query("SELECT id, name FROM doctor WHERE id = $id");
		} catch (PDOException $e) {
			errorMesSQL('Ошибка получения доктора');
		}
		return $s->fetch(PDO::FETCH_ASSOC);
	}
	private function select()
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
	}
	public static function auth($doc_id, $password)
	{
		$pass = md5($password.'vet');
		try {
			$sql = 'SELECT COUNT(id) FROM doctor WHERE id = :id AND password = :pass';
			$r = $GLOBALS['pdo'] -> prepare($sql);
			$r->execute([':id'=>$doc_id,':pass'=>$pass]);
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при аутентификации',$e);
		}
		$login = $r->fetchColumn();
		if ($login==1) return true;
		else return false;
	}
}