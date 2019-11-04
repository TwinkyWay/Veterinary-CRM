<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Доктора</title>
	<link rel="stylesheet" type="text/css" href="<?=_CSS?>style.css">
</head>
<body>
<?php require_once PATH_ROOT.'header.html.php'; ?>
<?php require_once 'doctor.comp.php'; ?>
<table>
	<tr>
		<th>Имя</th><th>email</th><th>телефон</th><th>пароль</th><th>Действие</th>
	</tr>
	<tr>
		<td><input type="text" name="name"></td>
		<td><input type="email" name="email"></td>
		<td><input type="text" name="phone"></td>
		<td><input type="password" name="pass"></td>
		<td>
			<input type="hidden" name="action" value="doctor_add">
			<input type="submit" value="Добавить">
		</td>
	</tr>
<?php foreach ($doctors as $doctor): ?>
	<tr>
		<form method="post">
			<td><input type="text" name="name" value="<?=$doctor['name']?>"></td>
			<td><input type="email" name="email" value="<?=$doctor['email']?>"></td>
			<td><input type="text" name="phone" value="<?=$doctor['phone']?>"></td>
			<td><input type="password" name="pass"></td>
			<td>
				<input type="hidden" name="doctor_id" value="<?=$doctor['id']?>">
				<input type="hidden" name="action" value="doctor_edit">
				<input type="submit" value="Изменить">
			</td>
		</form>
	</tr>
<?php endforeach;?>
</table>

<?php if (isset($data)): ?>
	<div class="good">
		<div>
			<?=$data?>
			<input type="button" onclick="document.querySelector('.good').style.display = 'none'" value="OK">
		</div>			
	</div>
<?php endif; ?>

</body>
</html>