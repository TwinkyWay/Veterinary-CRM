<?php include_once 'file_path.php';?>
<header>
	<a href="<?=WWW_ROOT?>">Главная</a>
	<span>Доктор: <?=$_SESSION['doctor']['name']?></span>
	<form method="post">
		<input type="hidden" name="login" value="out">
		<input type="submit" value="Выход">
	</form>
	<?php if ($_SESSION['doctor']['id']==4):?>
		<a href="/control/">Про врачей</a>
	<?php endif;?>
</header>