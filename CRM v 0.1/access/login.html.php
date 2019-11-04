<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php require_once 'login.comp.php'; ?>
<div class="login_form">
	<?php if(isset($error_auth)):?>
		<div>
			<span style="color: red;">неверный пароль</span>	
		</div>
	<?php endif;?>
	<form method="post">
		<select name="doc_id" required>
			<option selected disabled>Выберите имя</option>
			<?php foreach ($doctors as $doc): ?>
				<option value="<?=$doc['id']?>"><?=$doc['name']?></option>
			<?php endforeach; ?>
		</select>
		<input type="text" name="pass" placeholder="пароль" required>
		<input type="hidden" name="login" value="in">
		<input type="submit" value="Вход">
	</form>
</div>
</body>
</html>