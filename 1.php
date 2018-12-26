$resultat = mysql_query($query);
        $array = mysql_fetch_array($resultat);
        if (empty($array)){
            echo 'Ошибка! Такого пользователя не существует';
        }
        elseif (mysql_num_rows($resultat) > 0){
         
        $password=null; 
                                               
        while($max--) {
              $password.=$chars[rand(0,$size)]; 
        }
        $newmdPassword = md5($password); 
        $title = 'Востановления пароля пользователя для сайта Site.ru!';
        $letter = 'Вы запросили восстановление пароля на сайте Site.ru \r\nВаш новый пароль: '.$password.'\r\nС уважением админестрация сайта Site.ru';
// Отправляем письмо
        if (mail($email, $title, $letter, "Content-type:text/plain; Charset=windows-1251\r\n")) {
             mysql_query("UPDATE users SET password = '$newmdPassword' WHERE email = '$email'");
        echo 'Новый пароль отправлен на ваш e-mail!<br><a ref="index.php">Главная страница</a>';
         }
      }                              
   }
mysql_close();

$code = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
            $max=10; 
            $size=StrLen($code)-1;
            while($max--) {
                $password.=$chars[rand(0,$size)]; 
            } 
            $newmdPassword = md5($password); 







            function utf8mail($to,$s,$body)
{
  $from_name="Сброс пароля на Сайте фотографа Ивана Синицина";
  $from_a = "robot@blog.ru";
  $reply="robot@blog.ru";
    $s= "=?utf-8?b?".base64_encode($s)."?=";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: =?utf-8?b?".base64_encode($from_name)."?= <".$from_a.">\r\n";
    $headers.= "Content-Type: text/plain;charset=utf-8\r\n";
    $headers.= "Reply-To: $reply\r\n";  
    $headers.= "X-Mailer: PHP/" . phpversion();
    mail($to, $s, $body, $headers);
}


if (isset($data['do_reset'])){
mysqli_connect("localhost","root","");
mysqli_select_db("users");
        $table = mysqli_query("SELECT 'login' FROM users WHERE email = '$email'"); 
        $row = mysqli_fetch_array($table);
        if (isset($row['login']))

      {
        echo "Вам на почту отправлен код для сброса пароля";
        $code = rand(1000000,9999999);
            utf8mail($data['email'],"Сброс пароля", "Ваш код для сброса ".$code);
            mysqli_query("UPDATE 'users' set 'code'= '$code' WHERE 'login'='{$row['login']}'");
      }
    }


   