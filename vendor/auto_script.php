<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = $pdo->prepare("SELECT PASSWORD FROM Users WHERE LOGIN = ?");
$sql->execute([$login]);
$user = $sql->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['PASSWORD'])) {
    // Пароль верифицирован, аутентификация прошла успешно
    // Устанавливаем сессионную переменную, например, user_id или login
    // Например: $_SESSION['user_login'] = $login; 
    // Это будет указывать на то, что пользователь вошел в систему
    // Удаляем сообщение об ошибке, если оно было установлено ранее
    unset($_SESSION['ERROR_MESSAGE']);
    // Перенаправляем пользователя на админ-страницу
    header('Location: ../admin.php');
    exit();
} else {
    // Логин не найден или пароль не совпадает
    $_SESSION['ERROR_MESSAGE'] = 'Неправильный логин или пароль';
    header('Location: ../auto.php');
    exit();
}
