<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
</head>
<body>
	<?php require_once PATH_ROOT.'/header.html.php'; ?>
	<?php require_once 'profile.comp.php'; ?>
	<div>
		<fieldset>
			<legend>Информация о владельце</legend>
			<form method = 'post'>
				<label>ФИО:<input type='text' name='name' value="<?=$owner['name']?>"></label>
				<label>Адрес:<input type='text' name='address' value="<?=$owner['address']?>"></label>	
				<label>Телефон:<input type='text' name='phone' value="<?=$owner['phone']?>"></label>
				<label>E-mail:<input type='email' name='email' value="<?=$owner['email']?>"></label>
				<input type="hidden" name="idOwner" value="<?=$owner['id']?>">
				<input type="hidden" name="action" value="editOwner">
				<input type='submit' value='Изменить'>
			</form>
		</fieldset>
	</div>
	<br>
	<br>
	<div>
		<fieldset>
			<legend>Добавить нового питомца</legend>
			<form method="post">
				<label>Кличка: <input type="text" name="animal_name"></label>
				<label>Вид: 
					<select name="animal_type">
						<option></option>
						<?php foreach (Type::select() as $type):?>
							<option value="<?=$type['id']?>"><?=$type['name']?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label>Пол: 
					<select name="gender">
						<option></option>
						<?php foreach (Gender::select() as $gender):?>
							<option value="<?=$gender['id']?>"><?=$gender['name']?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label>Порода: <input type="text" name="animal_breed"></label>
				<label>Дата рождения: <input type="date" name="animal_bd" required></label>
				<label>Окрас: <input type="text" name="animal_color"></label>
				<label>Вес: <input type="text" name="animal_weigth"></label>
				<label>Номер клейма: <input type="text" name="animal_stigma"></label>
				<label>Чип<input type="text" name="animal_chip"></label>
				<input type="hidden" name="idOwner" value="<?=$owner['id']?>">
				<input type="hidden" name="action" value="addAnimal">
				<input type="submit" value="Добавить">
			</form>
		</fieldset>
		
	</div>
	<br>
	<br>
	<?php if(!empty($animals)):?>
		<div>
			<?php foreach ($animals as $animal): ?>
				<fieldset>
					<legend><b><?=$animal['name']?></b></legend>
					<a href="../reception/?idAnimal=<?=$animal['id']?>&idOwner=<?=$owner['id']?>">На приём</a>
					<form method="post">
						<label>Кличка: <input type="text" name="animal_name" value="<?=$animal['name']?>"></label>
						<label>Вид: 
							<select name="animal_type">
								<?php foreach ($animal['type_select'] as $type): ?>
									<option value="<?=$type['id']?>"<?php if($type['selected']) echo ' selected';?>><?=$type['name']?></option>
								<?php endforeach ?>
							</select>
						</label>
						<label>Пол: 
							<select name="gender">
								<?php foreach ($animal['gender_select'] as $g): ?>
									<option value="<?=$g['id']?>"<?php if($g['selected']) echo ' selected';?>><?=$g['name']?></option>
								<?php endforeach ?>
							</select>
						</label>
						<label>Порода: <input type="text" name="animal_breed" value="<?=$animal['breed']?>"></label>
						<label>Дата рождения: <input type="date" name="animal_bd" value="<?=$animal['birthday']?>"></label>
						<label>Окрас: <input type="text" name="animal_color" value="<?=$animal['color']?>"></label>
						<label>Вес: <input type="text" name="animal_weigth" value="<?=$animal['weigth']?>"></label>
						<label>Номер клейма: <input type="text" name="animal_stigma" value="<?=$animal['stigma']?>"></label>
						<label>Чип<input type="text" name="animal_chip" value="<?=$animal['chip']?>"></label>
						<input type="hidden" name="idAnimal" value="<?=$animal['id']?>">
						<input type="hidden" name="action" value="editAnimal">
						<input type="submit" value="Изменить">
					</form>
				</fieldset>
				<div class="last_visit">
					<?php if (!empty($visits=Reception::last_visit($animal['id'],0))):
						foreach ($visits as $visit):?>
							<a href="../reception/index2.php?recept=<?=$visit['id']?>">Дата визита: <?=$visit['date']?></a>
							<span>Врач: <?=$visit['doc_name']?>,</span>
							<span>диагноз: <?=$visit['text6']?></span><br/>
					<?php endforeach; endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif ;?>
<?//=var_dump($GLOBALS)?>
<?php require_once PATH_ROOT.'/succes_action.php'; ?>
</body>
</html>