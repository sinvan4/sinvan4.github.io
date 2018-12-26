<?php
require "db.php"
?>

<?php if( isset($_SESSION['logged_user'])):?>
	Авторизован! <br>
	Привет, <?php echo $_SESSION['logged_user']->login;?>!
	<hr>
	<a href="logout.php">Выйти</a>
<?php else : ?>
	
<a href="/login.php">Вход</a>
<a href="/register.php">Регистрация</a>
<?php endif; ?>