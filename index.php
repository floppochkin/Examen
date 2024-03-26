<?php
    if(!isset($_SESSION["user"])) {
        header("Location: auto.php");
    }
    if(isset($_SESSION["admin"])) {
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="site">
        <header>
            <a href="#">Написать жалобу</a>
            <a href="vendor/logout_script.php">Выйти</a>
        </header>
    </div>
</body>
</html>