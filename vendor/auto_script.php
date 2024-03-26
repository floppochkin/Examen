<?php
session_start();
require_once 'connect.php';


$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = $pdo->prepare("SELECT `LOGIN`, `PASSWORD` FROM `Users` WHERE LOGIN = ? AND PASSWORD = ?");
$sql->execute([$login,$pass]);

$user = $sql->fetch(PDO::FETCH_ASSOC);
if($user && password_verify($pass,$user['PASSWORD'])){
    header('Location: ../admin.php');
}else{
    header('auto.php');
    exit();
}
