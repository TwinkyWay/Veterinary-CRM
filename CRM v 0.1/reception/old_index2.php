<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Инфо о приёме</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
	<script src="<?=_SCRIPT?>script.js"></script>
</head>
<body>
	<?php require_once PATH_ROOT.'header.html.php'; ?>

	<?php require_once 'result_recept.comp.php'; ?>

<!--вставка шапки с владельцем-->
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
<!--конец вставка шапки с владельцем-->
<?php if ($_SESSION['doctor']['id']==4):?>
	<div>
		<a href="index.php?idAnimal=<?=$info['animal_id']?>&idOwner=<?=$owner['id']?>&recept=<?=$info['id']?>">Редактировать</a>
	</div>
<?php endif;?>
<?=var_dump($info,$recept->get_order())?>




	

	


<?php require_once PATH_ROOT.'succes_action.php'; ?>
<?//=var_dump($GLOBALS)?>
</body>
</html>