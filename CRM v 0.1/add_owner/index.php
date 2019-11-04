<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Новый владелец</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
</head>
<body>
<?php require_once PATH_ROOT.'/header.html.php'; ?>
<!-- Добавление владельца -->

<?php require_once 'add_owner.comp.php';?>
<div>
	<fieldset>
		<legend>Регистрация владельца</legend>
		<form method = 'post'>
			<label>ФИО:<input type='text' name='name'></label>
			<label>Адрес:<input type='text' name='address'></label>	
			<label>Телефон:<input type='text' name='phone'></label>
			<label>E-mail:<input type='email' name='email'></label>
			<input type="hidden" name="action" value="addOwner">
			<input type='submit' value='Добавить нового владельца'>
		</form>
	</fieldset>
</div>

</body>
</html>