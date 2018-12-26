<?php

require "db.php";
session_start();
$data = $_POST;
if ( isset($data['do_register']))
{
	//здесь регистрируем
	$errors = array();
	if( R::count('users', "login = ?", array($data['login'] ))> 0 )	
		// OR email = ?  , 
	{
		$errors[] = 'Пользователь с таким логином уже существует!';
	}


	if( R::count('users', "email = ?", array($data['email'] ))> 0 )	
		// OR email = ?  , $data['email']
	{
		$errors[] = 'Пользователь с таким email уже существует!';
	}


	if (empty($errors))
	{
		//все хорошо, регистрируем
		$user = R::dispense('users');
		$user->surname = $data['surname'];
		$user->name = $data['name'];
		$user->patronymic = $data['patronymic'];
		$user->email = $data['email'];
		$user->login = $data['login'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->r_password = password_hash($data['r_password'], PASSWORD_DEFAULT);
		$user->telephone = $data['telephone'];
		R::store($user);
		echo '<div style="color: green;">Вы успешно зарегестрировались!</div><hr>';
		include 'index.html';
		exit();


	} else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}

}
?>
