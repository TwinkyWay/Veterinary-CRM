<?php require_once 'access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Приём</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
	<script src="<?=_SCRIPT?>search_ajax.js"></script>
</head>
<body>
<?php require_once PATH_ROOT.'header.html.php'; ?>
<div>
<?php require_once 'search.comp.php'; ?>
<h1>Регистратура</h1>
<a href="add_owner/">Новый клиент</a>
<div class="find">
	<div class="by_owner">
		<?php if (isset($owners)&&$owners=='no_found'): ?>
			<div>Клиентиа с таким именем не найдено</div>
		<?php endif; ?>
		<form method="post">
			<p>Поиск в базе по владельцу</p>
			<p><input type="search" name="f_name_owner" list="f_name_owner" required autocomplete="off">
				<datalist id="f_name_owner"></datalist>
			</p>
			<input type="hidden" name="action" value="find_owner">
			<input type="submit" value="Поиск">
		</form>
		<?php if (isset($owners)&&$owners!='no_found'): ?>
		<div>
			<?php foreach ($owners as $owner) :?>
				<div>
					<b>Владелец <?=$owner['name']?></b>
					<div>
						<?php foreach ($owner['animal'] as $animal) :?>
							<a href="<?=WWW_ROOT?>reception/?idAnimal=<?=$animal['id']?>&idOwner=<?=$owner['id']?>"><?=$animal['name']?></a>
						<?php endforeach; ?>
						<a href="<?=WWW_ROOT?>profile/?idOwner=<?=$owner['id']?>">Просмотр профиля</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="by_animal">
		<?php if (isset($animals)&&empty($animals)): ?>
			<div>Питомца с таким именем не найдено</div>
		<?php endif; ?>
		<form method="post">
			<p>Поиск в базе по питомцу</p>
			<p><input type="search" name="f_name_animal" list="f_name_animal" required autocomplete="off">
				<datalist id="f_name_animal"></datalist>
			</p>
			<input type="hidden" name="action" value="find_animal">
			<input type="submit" value="Поиск">
		</form>
		<?php if(isset($animals)&&!empty($animals)):?>
			<?php foreach ($animals as $animal):?>
				<div>
					<a href="<?=WWW_ROOT?>reception/?idAnimal=<?=$animal['id']?>&idOwner=<?=$animal['owner_id']?>"><?=$animal['name']?></a>
					<span><?=$animal['age']?></span>
					<span><?=$animal['type_name']?></span>
					<a href="<?=WWW_ROOT?>profile/?idOwner=<?=$animal['owner_id']?>"><?=$animal['owner_name']?></a>
				</div>
			<?php endforeach;?>
		<?php endif;?>
	</div>
</div>

</body>
</html>