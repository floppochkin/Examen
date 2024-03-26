<?php
session_start();
require_once 'connect.php';


$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = $pdo->prepare("SELECT LOGIN, PASSWORD FROM Users WHERE LOGIN = ? AND PASSWORD = ?");
$sql->execute([$login,$pass]);

$user = $sql->fetch(PDO::FETCH_ASSOC);
if($user && password_verify($pass,$user['PASSWORD'])){
    $_SESSION['ERROR_MESSAGE'] = 'ura';
    header('Location: ../admin.php');
}else{
    $_SESSION['ERROR_MESSAGE'] = 'Такой логин уже существует';
    header('Location: ../auto.php');
    exit();
}
