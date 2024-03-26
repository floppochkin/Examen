<?php
    session_start()
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
    <div class="wrap">
        <div class="header"></div>
        <div class="wrap_forma">
            <form action="vendor/auto_script.php" method="POST">
                <div class="btns">
                    <div class="btn_login">
                        <input type="text" name='login' placeholder="Введите ваш логин" />
                        <label for='login'>Ваш логин</label>
                    </div>
                    <div class="btn_password">
                        <input type="password" name='pass' placeholder="Введите ваш пароль" />
                        <label for='password'>Ваш пароль</label>
                    </div>
                </div>
                <div class="btn_submit">
                    <button type='submit'>Зарегестрироваться!</button>
                </div>
                <?php
                    if(isset($_SESSION['ERROR_MESSAGE'])){
                        echo '<p>'.$_SESSION['ERROR_MESSAGE'].'</p>';
                    }
                    unset($_SESSION['ERROR_MESSAGE'])
                ?>
            </form>
        </div>
    </div>
</body>

</html>