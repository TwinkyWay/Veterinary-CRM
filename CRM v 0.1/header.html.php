<?php include_once 'file_path.php';?>
<header>
    <div class="header__login">
        <a href="<?=WWW_ROOT?>"><img src="https://cdn3.iconfinder.com/data/icons/streamline-icon-set-free-pack/48/Streamline-18-24.png" alt="home"></a>
        <span>Доктор: <?=$_SESSION['doctor']['name']?></span>
        <form method="post">
            <input type="hidden" name="login" value="out">
            <input type="submit" value="Выход">
        </form>
        <?php if ($_SESSION['doctor']['id']==4):?>
			<a href="/control/">Про врачей</a>
		<?php endif;?>
    </div>
</header>