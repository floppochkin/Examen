<?php
session_start();
require_once 'connect.php';

$fio = $_POST['fio'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = $pdo->prepare('INSERT INTO `Users` (`FIO`, `TELEPHONE`, `EMAIL`, `LOGIN`, `PASSWORD`) 
VALUES (?,?,?,?,?)');

$sql2 = $pdo->prepare('SELECT `login` FROM `Users` WHERE login = ? LIMIT 1');
$sql2->execute([$login]);
$result = $sql2->fetch(PDO::FETCH_ASSOC);
print_r($result);
if (!preg_match("/^[а-яёА-ЯЁs]+$/u", $fio)) {
    $_SESSION['ERROR_MESSAGE'] = 'ошибка в фио';
    header("Location: ../reg.php");
    exit();

}

if (!preg_match("/^[а-яёА-ЯЁs]+$/u", $phone)) {
    $_SESSION['ERROR_MESSAGE'] = 'ошибка в телефоне';
    header("Location: ../reg.php");
    exit();
    #header("Location: ../reg.php");
}

if($result){
    $_SESSION['ERROR_MESSAGE'] = 'Такой логин уже существует';
    header("Location: ../reg.php");
    exit();
}

$sql->execute([$fio, $phone, $email, $login, $pass]);
