<?php
require "db.php";

$resultat = R::getRow( "SELECT * FROM users  WHERE id='$_GET[id]'");
$array = foreach($resultat);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    
    <title>Фотограф Иван Синицин</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.css">
<head>
<title>Профиль <?php echo  $login; ?></title>
</head>
<body>
<h4>Профиль <?php echo  $login; ?></h4>
 
<?php
if(isset($login) AND isset($password)){
if($array['avatar'] == ''){
$avatar = "noAvatar.jpg";
}else{
}
echo "<img  src='avatars/".$avatar."'> <br><br>";
echo  "<strong>".$array['name_user']."  ".$array['lastname']."</strong><br>";
switch ($array['birthdate_month']){//Превращаем номер месяца в название
    case "1" : $month = "Января";  break;
    case "2" : $month = "Февраля";  break;
    case "3" : $month = "Марта";  break;
    case "4" : $month = "Апреля";  break;
    case "5" : $month = "Мая"; break;
    case "6" : $month = "Июня"; break;
    case "7" : $month = "Июля"; break;
    case "8" : $month = "Августа";  break;
    case "9" : $month = "Сентября";  break;
    case "10" : $month = "Октября";  break;
    case "11" : $month = "Ноября";  break;
    case "12" : $month = "Декабря";  break;
}
echo  "Дата регистрации: ".$array['reg_date']." <br>";
echo "Пол: ".$array['sex']."  <br>";
echo "День рождения:  ".$array['birthdate_day']." ".$month."  ".$array['birthdate_year']." <br>";
echo "Страна: ".$array['country']."  <br>";
echo "Город: ".$array['city']." <br>";
if($_GET['id'] == $id_user){//Редактировать профиль может только хозяин
echo  "<a href='edit.php'>Редактировать профиль</a>";
}
}else{
print <<<HERE
<table>
Вход:
<br>
<br>
 
<form action="login.php"  method="POST">
<tr>
<td>Логин:</td>
<td><input type="text"  name="login" ></td>
</tr>
 
<tr>
<td>Пароль:</td>
<td><input type="password"  name="password" ></td>
</tr>
 
<tr>
<td colspan="2"><input  type="submit" value="OK" name="submit"  ></td>
</tr>
</form>
</table>
<a  href="registration.php">Регистрация</a><a  href="password.php">Восстановление пароля</a>
HERE;
}
?>
</body>
</html>