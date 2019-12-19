<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
    echo "Length login less 3 symbol";
    exit();
}
if (mb_strlen($password) < 6 || mb_strlen($password) > 90) {
    echo "Length login less 6 symbol";
    exit();
}
if (mb_strlen($name) < 3 || mb_strlen($name) > 90) {
    echo "Length login less 3 symbol";
    exit();
}
$password = md5([$password]['salt2']);
//-------------------------Connection-BD-----------------------------------//
//$userBD = 'root';
//$passwordBD = 'password';
//$mysql = new PDO('mysql:host=localhost;dbname=register-bd', $userBD, $passwordBD);
$mysql = new mysqli('localhost', 'root', 'password', 'register-bd');
$mysql->query("INSERT INTO `users` (`login`,`password`,`name`) VALUES ('$login','$password','$name')");
$mysql->close();
//------------------------------------------------------------------------//
header('Location: /');
?>
