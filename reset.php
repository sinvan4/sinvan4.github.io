<?php
require "db.php";
$data = $_POST;
if ( isset($data['do_reset'])) {
 $email = $data['email'];

 $selectqury = R::exec("SELECT * FROM users WHERE email='{$email}'");
 $count = R::getRow($selectqury);
 echo $count;
}
{
?>