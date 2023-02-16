<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Royal SPA saloon</title>
    
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<header>
    <div class="mainheader">
        <div class="header">
        <h1>Wellcome to the Royal Beauty SPA &#9825;</h1>
        </div>
        <div class="header1">
         <span id="tel">&#9990; +001 222 333 222  &#64; info@royalspa.com</span>
         </div>
        
    </div>
</header>
<a class="home" href="index.php">Вернуться на главную</a>

<?php
session_start();
$usersAll = file('users.php');
$usersAll2 = implode($usersAll);
$usersAll3 = explode(" ", $usersAll2);
$usersAll4 = array_chunk($usersAll3, 2);
$keys = array_column($usersAll4, '0');
array_pop($keys);
$trimmed_keys = array_map('trim', $keys);
$values = array_column($usersAll4, '1');
$usersTrue = array_combine($trimmed_keys, $values);
echo "<br>";
echo "<br>";
echo 'функция getUsersList() возвращает массив всех пользователей и хэшей их паролей;';
echo "<br>";

function getUsersList() {
    $usersAll = file('users.php');
for ($i=0; $i<sizeof($usersAll); $i++) {
    echo $i.'. login pasword: '. $usersAll[$i];
    echo "<br>";
}
}
getUsersList();
echo "<br>";
echo "<br>";

echo 'функция existsUser($login) проверяет, существует ли пользователь с указанным логином';
echo "<br>";
function existsUser($login) {
    $usersAll = file('users.php');
    $usersAll2 = implode($usersAll);
    $usersAll3 = explode(" ", $usersAll2);
    $usersAll4 = array_chunk($usersAll3, 2);
    $keys = array_column($usersAll4, '0');
    array_pop($keys);
    $trimmed_keys = array_map('trim', $keys);
    $values = array_column($usersAll4, '1');
    $usersTrue = array_combine($trimmed_keys, $values);
    if (isset($usersTrue[$login])) {
        echo 'true / Пользователь '. $login .' существует';
    } else {
        echo 'false / Пользователь '. $login .' несуществует';
    }
}

existsUser('admin');

echo "<br>";
echo "<br>";

echo 'функция checkPassword($login, $password) пусть возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false';
echo "<br>";


function checkPassword($login, $password) {
    $usersAll = file('users.php');
    $usersAll2 = implode($usersAll);
    $usersAll3 = explode(" ", $usersAll2);
    $usersAll4 = array_chunk($usersAll3, 2);
    $keys = array_column($usersAll4, '0');
    array_pop($keys);
    $trimmed_keys = array_map('trim', $keys);
    $values = array_column($usersAll4, '1');
    $usersTrue = array_combine($trimmed_keys, $values);
if (isset($usersTrue[$login]) && sha1($_SESSION['pass']) == sha1($password) ) {
    echo 'result: true';
} else {
    echo 'result: false';
}
}
checkPassword('admin', 123);

echo "<br>";
echo "<br>";

echo 'функция getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null';
echo "<br>";
function getCurrentUser() {
    if ($_SESSION['auth']) {
        echo $_SESSION['login'];
        return $_SESSION['login'];
    } else {
        return null;
    }
}
echo "<br>";
getCurrentUser();

?>









</body>
</html>