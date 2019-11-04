<?php
/**
* 
*/
class Reception
{
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
	public function all_info()
	{
		try {
			$sql = 'SELECT r.id, r.doctor_id doc_id, d.name doc_name, d.phone doc_phone, a.id animal_id, a.name animal_name, g.id gender_id, g.name gender_name, t.id type_id, t.name type_name, a.breed ,`date_reception`, `date_illness`, text1, text2, text3, text4, text5, text6
					FROM reception r INNER JOIN
					doctor d ON d.id = r.doctor_id INNER JOIN
					animals a ON a.id = r.animal_id INNER JOIN
					animal_gender g ON g.id = a.gender_id INNER JOIN
					types_animals t ON t.id = a.type_id
			 		WHERE r.`id` = :id';
			$s = $GLOBALS['pdo'] -> prepare($sql);
			$s->bindValue(':id', $this->id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении инфо о приёме',$e);
		}
		return $s->fetch(PDO::FETCH_ASSOC);
	}
	public static function last_visit($animal_id, $value=1)
	{
		if (!is_numeric($value)) {
			return 'только число';
		}
		$sql = "SELECT r.id, r.`date_reception` `date`, r.text6, r.doctor_id doc_id, d.name doc_name
				FROM reception r 
				INNER JOIN doctor d ON d.id = r.doctor_id
				WHERE r.animal_id = :animal_id 
				ORDER BY `date_reception` DESC";
		if ($value>=1) {
			$sql .= " LIMIT $value";
		}
		try {
			//$s = $GLOBALS['pdo']->query($sql);
			$s = $GLOBALS['pdo']->prepare($sql);
			$s->bindValue(':animal_id', $animal_id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении краткой инфо о приёме(последний приём)', $e);
		}
		if ($value===1) {
			return $s->fetch(PDO::FETCH_ASSOC);
		} else {
			return $s->fetchAll(PDO::FETCH_ASSOC);;
		}
	}

	public function get_order()
	{
		try {
			$sql = 'SELECT `description` `cons_desc`, `price` `cons_price` FROM `consumables` WHERE `reception_id` = :id';
			$s = $GLOBALS['pdo'] -> prepare($sql);
			$s->bindValue(':id', $this->id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении информации о расходниках', $e);
		}
		$cons = $s->fetch();
		$arr['cons_desc'] = $cons['cons_desc'];
		$arr['cons_price'] = $cons['cons_price'];
		try {
			$sql = 'SELECT SUM(price) FROM `price` INNER JOIN
			 		`order` ON `order`.price_id = `price`.`code_id` 
					WHERE reception_id = :id';
			$s = $GLOBALS['pdo'] -> prepare($sql);
			$s->bindValue(':id', $this->id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении суммы приёма', $e);
		}	
		$arr['sum'] = $arr['cons_price']+$s->fetchColumn();
		try {
			$sql = 'SELECT code_id, name, price FROM `price` INNER JOIN
			 		`order` ON `order`.price_id = `price`.`code_id` 
			 		WHERE reception_id = :id';
			$s = $GLOBALS['pdo'] -> prepare($sql);
			$s->bindValue(':id', $this->id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении стоимости приёма', $e);
		}
		$arr['detail'] = $s->fetchAll(PDO::FETCH_ASSOC);
		return $arr;
	}

	public function owner_id()
	{
		try {
			$sql = 'SELECT o.id FROM owner o INNER JOIN
					`animals` a ON a.owner_id = o.id INNER JOIN 
			 		`reception` r ON r.animal_id = a.id 
			 		WHERE r.`id` = :id';
			$s = $GLOBALS['pdo'] -> prepare($sql);
			$s->bindValue(':id', $this->id);
			$s->execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при получении владельца');
		}
		return $s->fetchColumn();
	}

	public static function add($placeholder, $service=null)
	{
		$new_holder = array_chunk($placeholder, 10, true);
		$GLOBALS['pdo']->beginTransaction();
		try {
			$sql = 'INSERT INTO reception (doctor_id, animal_id, `date_reception`, `date_illness`, text1, text2, text3, text4, text5, text6) VALUES (:idDoc, :idAnim, :date_recept, :date_illness, :text1, :text2, :text3, :text4, :text5, :text6)';
			$i = $GLOBALS['pdo']->prepare($sql);
			$i -> execute($new_holder[0]);
		} catch (PDOException $e) {
			$GLOBALS['pdo']->rollBack();
			errorMesSQL('Ошибка при добавлении приёма',$e);
		}
		$recept_id = $GLOBALS['pdo']->lastInsertId();
		$new_holder[1][':id'] = $recept_id;
		try {
			$sql = 'INSERT INTO `consumables`(`reception_id`, `description`, `price`) VALUES (:id,:cons_desc,:cons_price)';
			$i=$GLOBALS['pdo']->prepare($sql);
			$i->execute($new_holder[1]);
		} catch (PDOException $e) {
			$GLOBALS['pdo']->rollBack();
			errorMesSQL('Ошибка при добавлении расходников',$e);
		}
		if (!empty($service)){
			try {
				$sql = 'INSERT INTO `order`(`reception_id`, `price_id`) VALUES (:id,:code)';
				$i=$GLOBALS['pdo']->prepare($sql);
				foreach ($service as $code) {
					$i->bindValue(':id', $recept_id);
					$i->bindValue(':code', $code);
					$i->execute();
				}
			} catch (PDOException $e) {
				$GLOBALS['pdo']->rollBack();
				errorMesSQL('Ошибка при добавлении кода услуг (первичное)',$e);
			}
		}
		$GLOBALS['pdo']->commit();
		return $recept_id;
	}

	public static function edit($placeholder, $service=null)
	{
		$recept_id = $placeholder[':id'];
		$new_holder = array_chunk($placeholder, 7, true);
		$new_holder[1][':id'] = $placeholder[':id'];
		$GLOBALS['pdo']->beginTransaction();
		try {
			$sql = 'UPDATE reception SET
							text1 =:text1,
							text2 =:text2,
							text3 =:text3,
							text4 =:text4,
							text5 =:text5,
							text6 =:text6
					WHERE id = :id';
			$i = $GLOBALS['pdo']->prepare($sql);
			$i -> execute($new_holder[0]);
		} catch (PDOException $e) {
			$GLOBALS['pdo']->rollBack();
			errorMesSQL('Ошибка при обновлении приёма', $e);
		}
		try {
			$sql = 'UPDATE `consumables` SET
							`description` =:cons_desc,
							`price` =:cons_price
					WHERE reception_id = :id';
			$i = $GLOBALS['pdo']->prepare($sql);
			$i -> execute($new_holder[1]);
		} catch (PDOException $e) {
			$GLOBALS['pdo']->rollBack();
			errorMesSQL('Ошибка при обновлении расходников', $e);
		}
		if (!empty($service)){
			try {
				$sql = 'DELETE FROM `order` WHERE `reception_id` = :recept_id';
				$d = $GLOBALS['pdo']->prepare($sql);
				$d->bindValue(':recept_id', $recept_id);
				$d->execute();
			} catch (PDOException $e) {
				$GLOBALS['pdo']->rollBack();
				errorMesSQL('Ошибка при удалении услуг', $e);
			}
			try {
				$sql = 'INSERT INTO `order`(`reception_id`, `price_id`) VALUES (:id,:code)';
				$i=$GLOBALS['pdo']->prepare($sql);
				foreach ($service as $code) {
					$i->bindValue(':id', $recept_id);
					$i->bindValue(':code', $code);
					$i->execute();
				}
			} catch (PDOException $e) {
				$GLOBALS['pdo']->rollBack();
				errorMesSQL('Ошибка при добавлении кода услуг (вторично)', $e);
			}
		}
		$GLOBALS['pdo']->commit();
		return true;
	}
	public function delete_service($code_id)
	{
		try {
			$sql = 'DELETE FROM `order` WHERE `reception_id` = :id AND `price_id` = :code';
			$d = $GLOBALS['pdo']->prepare($sql);
			$d -> bindValue(':id', $this->id);
			$d -> bindValue(':code', $code_id);
			$d -> execute();
		} catch (PDOException $e) {
			errorMesSQL('Ошибка при удалении услуги', $e);
		}
		return true;
	}
}