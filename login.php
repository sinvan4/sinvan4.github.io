<?php
require "db.php";
session_start();
$data = $_POST;


if( isset($data['do_login']))
{
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));

	if ($user) 
	{
				//ЛОГИН СУЩЕСТВУЕТ, ТО ПРОВЕРЯЕМ ПАРОлЬ
		if ( password_verify($data['password'], $user->password)){
			//все хорошо логиним пользователя
			$_SESSION['logged_user']= $user;
			echo '<div style="color: green;">Вы успешно авторизовались!<br/></div><hr>';
			header( "Location: index.html" );
			


		
		} else 
		{
			$errors[] = 'Неверный пароль!';
		}
	} else
	{
		$errors[] = 'Пользователь с таким логином не найден!';
	}


	if ( ! empty($errors))
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';

	}

}
?>
<?
if (isset($_SESSION['logged_user'])):?>
