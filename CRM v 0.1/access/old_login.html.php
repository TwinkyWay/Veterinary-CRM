<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<style type="text/css">
		body {
			display: flex;
			height: 100vh;
		}
		.login {
			margin: auto;
			min-width: 200px;
			border-radius: 5px;
			border: 1px solid silver;
			padding: 5px;
			text-align: center;
			box-shadow: 0 0 10px rgba(0,0,0,0.5);
		}
		.login select{
			height: 21px;
			width: 110px;
		}
		.login [type="password"] {
			width: 106px;
		}
	</style>
</head>
<body>

<?php require_once 'login.comp.php'; ?>
<div class="login">
	<span>Вход</span>
	<?php if(isset($error_auth)):?>
		<div>
			<span style="color: red;">неверный пароль</span>	
		</div>
	<?php endif;?>
	<form method="post">
		<table>
			<tr>
				<td>
					<label for="doc_id">Имя:</label>
				</td>
				<td>
					<select name="doc_id" id="doc_id" required>
						<option></option>
						<?php foreach ($doctors as $doc): ?>
							<option value="<?=$doc['id']?>"><?=$doc['name']?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Пароль:</label>
				</td>
				<td>
					<input type="password" name="pass" id="password" maxlength="20" required>
				</td>
			</tr>
		</table>
		<input type="hidden" name="login" value="in">
		<input type="submit" value="Вход">
	</form>
</div>
</body>
</html>