<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Приём</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
	<script src="<?=_SCRIPT?>func_sum.js"></script>
	<script src="<?=_SCRIPT?>add_services.js"></script>
	<script src="<?=_SCRIPT?>delete_services.js"></script>
</head>
<body>
	<?php require_once PATH_ROOT.'header.html.php'; ?>
	<?php require_once 'reception.comp.php'; ?>
	<div>
		<span>Владелец: </span>
		<a href="<?=WWW_ROOT?>profile/?idOwner=<?=$owner['id']?>"><?=$owner['name']?></a>
		<?php if(!empty($owner['animals'])): ?>
			<span>Питомцы: </span>
			<?php foreach ($owner['animals'] as $animal): ?>
				<a href="?idAnimal=<?=$animal['id']?>&idOwner=<?=$owner['id']?>"><?=$animal['name']?></a>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<br>
	<h3>Приём <b><?=$animalInfo['name']?></b></h3>
	<div>
		<span>Порода: <em><?=$animalInfo['breed']?></em>,</span>
		<span>Пол: <em><?=$animalInfo['genderName']?></em>,</span>
		<span>Дата рождения: <em><?=$animalInfo['bd']?> (возраст <?=$animalInfo['age']?>)</em></span>
	</div>
	
	<br>
	<!-- дата визита -->
	<?php if (!empty($visit=Reception::last_visit($animalInfo['id']))):?>
				<a href="../reception/index2.php?recept=<?=$visit['id']?>">Дата последнего визита: <?=$visit['date']?></a><br/>
	<?php endif; ?>

	<!-- вакцинация -->
	<?php require_once 'vaccination.comp.php'; ?>
	<div class="vaccination">
		<?php if(empty($vac_date)): ?>
			<span>Записей о вакцинации не найдено</span>
		<?php else: ?>
			<span>Дата последней вакцинации <?=$vac_date['date']?>, тип <em><?=$vac_date['text']?></em></span>
		<?php endif; ?>
		<fieldset>
			<legend>Введение вакцины для питомца</legend>
			<form method="post">
				<input type="date" name="vac_date" value="<?=date("Y-m-d")?>">
				<input type="text" name="vac_text" required>
				<input type="hidden" name="vac_idAnimal" value="<?=$animalInfo['id']?>">
				<input type="hidden" name="action" value="add_vac">
				<input type="submit" value="Добавить">
			</form>
		</fieldset>		
	</div>
	<br>
	<br>
	<!--приём -->
	<?php require_once 'add_reception.comp.php'; ?>
	<div class="reception">
		<form method="post" id="reception_form">
			<fieldset<?php if(isset($edit_reception)&&!$edit_reception) echo ' disabled';?>>
				<legend>Приём</legend>
				<label>Дата приёма: <input type="date" name="date_recept" value="<?=$date_recept?>"></label>
				<label>Дата заболевания: <input type="date" name="date_illness" value="<?=$date_illness?>"></label>
				<label>Анамнез: <textarea type="text1" name="text1"><?=$text1?></textarea></label>
				<label>Первичный диагноз: <input type="text2" name="text2" value="<?=$text2?>"></label>

				<label>Клинические признаки: <textarea type="text" name="text3"><?=$text3?></textarea></label>
				<div>
					<label>Лечебная помощь: <input type="text" name="text4" value="<?=$text4?>"></label>
					<label>Рекомендации: <textarea type="text" name="text5"><?=$text5?></textarea></label>
				</div>
				<div>	
					<label>Окончательный диагноз: <textarea name="text6" cols="40" rows="3"><?=$text6?></textarea></label>
				</div>
				
				<fieldset>
					<legend>Услуги</legend>
					<fieldset>
						<legend>Расходные материалы:</legend>
						<label hidden="true">Описание: <input type="text" name="cons_desc" value="<?=$order_info['cons_desc']?>"></label>
						<label>Стоимость: <input type="number" class="price" name="cons_price" value="<?=$order_info['cons_price']?>" onkeyup="sum()" min="0"></label>
					</fieldset>
					<div id="servicesCode">
						<label>Код услуги: <input list="price">
						<datalist id="price">
						</datalist>
						</label>
						<div id='choice'>
							<?php if(isset($order_info)&&!empty($order_info['detail'])):?>
								<?php foreach($order_info['detail'] as $order): ?>
									<div class="service">
										<input type="number" name="code_id[]" value="<?=$order['code_id']?>">
										<input type="text" value="<?=$order['name']?>" readonly>
										<input type="text" class="price" value="<?=$order['price']?>" readonly>
										<input type="button" class="btn_delete" value="Удалить">
									</div>
								<?php endforeach; ?>
							<?php endif;?>
						</div>
						<?php if(isset($order_info)&&!empty($order_info['cons_price'])):?>
						<div class="sum">
							<span>Сумма: </span>
							<input type="text" value="<?=$order_info['sum']?>" readonly>
						</div>
						<?php endif;?>
					</div>
				</fieldset>

				<?php if (isset($_GET['recept'])&&$edit_reception): ?>
					<input type="hidden" name="action" value="edit_reception">
					<input type="button" value="Изменить" id='sendForm'>
				<?php elseif (isset($_GET['recept'])&&!$edit_reception): ?>
					<span>Редактирование доступно для лечащего врача (<?=$rec['doc_name']?>)</span>
				<?php else: ?>
					<input type="hidden" name="idAnimal" value="<?=$animalInfo['id']?>">
					<input type="hidden" name="action" value="add_reception">
					<input type="button" value="Добавить" id='sendForm'>
				<?php endif;?>
			</fieldset>
		</form>
	</div>
	<?php if (isset($_GET['recept'])): ?>
		<div>
			<a href="index2.php?recept=<?=$_GET['recept']?>">Дальше</a>
		</div>
	<?php endif;?>
<?php require_once PATH_ROOT.'succes_action.php'; ?>
</body>
</html>