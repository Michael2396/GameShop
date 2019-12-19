<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
    echo "Length login less 3 symbol";
    exit();
}
if (mb_strlen($password) < 6 || mb_strlen($password) > 90) {
    echo "Length login less 6 symbol";
    exit();
}
$password = md5([$password]['salt2']);
//-------------------------Connection-BD-----------------------------------//
$userBD = 'root';
$passwordBD = 'password';
$mysql = new mysqli('localhost', 'root', 'password', 'register-bd');
$result= $mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
$user = $result->fetch_assoc();
    if (count($user)==0){
        echo "Такой пользователь не найден";
        exit();
    }
print_r($user);
exit();

$mysql->close();
//------------------------------------------------------------------------//
header('Location: /');

?>