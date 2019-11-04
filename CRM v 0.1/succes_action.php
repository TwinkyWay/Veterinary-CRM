<?php if (isset($next)): ?>
	<div class="good">
		<div>
			<?=$data?>
			<form method="post">
				<!--<input type="submit" name="good" value="OK">-->
			</form>
			<?php if ($next===2): ?>
				<a href="index.php?<?=$_SERVER['QUERY_STRING']?>">Продолжить</a>
			<?php else: ?>
				<a href="index.php?<?=$_SERVER['QUERY_STRING']."&recept=$recept_id"?>">Продолжить</a>
			<?php endif ?>	
		</div>			
	</div>
<?php endif; ?>
<?php if (isset($next2)): ?>
	<div class="good">
		<div>
			<?=$data?>
			<form method="post">
				<!--<input type="submit" name="good" value="OK">-->
			</form>
			<a href="index3.php?&recept=<?=$id_recept?>">Далее</a>
		</div>			
	</div>
<?php endif; ?>
<?php if (!isset($next)&&!isset($next2)&&isset($data)&&!empty($data)): ?>
	<div class="good">
		<div>
			<?=$data?>
			<form method="post">
				<input type="submit" name="good" value="OK">
			</form>
		</div>			
	</div>
<?php endif; ?>