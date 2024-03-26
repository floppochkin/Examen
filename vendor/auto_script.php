<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = $pdo->prepare("SELECT PASSWORD FROM `users` WHERE LOGIN = ?");
$sql->execute([$login]);
$user = $sql->fetch(PDO::FETCH_ASSOC);
$sql2 = $pdo->prepare("SELECT * FROM `users` WHERE LOGIN = ?");
$sql2->execute([$login]);
$fetchUser = $sql2->fetch(PDO::FETCH_ASSOC);
$checkUser = mysqli_query($pdo, $fetchUser);

if ($user && password_verify($pass, $user['PASSWORD'])) {
    // Пароль верифицирован, аутентификация прошла успешно
    // Устанавливаем сессионную переменную, например, user_id или login
    // Например: $_SESSION['user_login'] = $login; 
    // Это будет указывать на то, что пользователь вошел в систему
    // Удаляем сообщение об ошибке, если оно было установлено ранее
    unset($_SESSION['ERROR_MESSAGE']);

    if(mysqli_num_rows(($checkUser['LOGIN']) > 0) AND ($checkUser['ADMIN'] == 0)){ 

        $_SESSION['user'] = [ #Создание сессии юзера
            "id" => $checkUser['id'],
            "fio" => $checkUser['FIO'],
            "email" => $checkUser['EMAIL'],
            "phonenum" => $checkUser["TELEPHONE"],
            "login" => $checkUser["LOGIN"]
        ];
        header('Location: ../index.php');
    } else {
        $_SESSION['admin'] = [ #Создание сессии админа
            'login'=> $admin['id']
        ];
        header('Location: ../admin.php');
    }
    // Перенаправляем пользователя на админ-страницу
    exit();
} else {
    // Логин не найден или пароль не совпадает
    $_SESSION['ERROR_MESSAGE'] = 'Неправильный логин или пароль';
    header('Location: ../auto.php');
    exit();
}
