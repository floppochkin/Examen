1. Подготовленный запрос
<?php
$sql = $pdo->prepare('Сам sql запрос'); 
$sql->execute(array('login' => $login,'password'=>$password));
$array = $sql->fetch(PDO::FETCH_ASSOC);
if($array["id"]>0){
	$_SESSION['login'] =$array["login"];
}
 //Страничка админа и прочие внутренние скрипты


    print_r("<?php if(!empty($_SESSION[login])) :?>
    <?php else:
        //Код странички для случайно вошедшего пользоватля
        ?>");


//Вывод данных как объект
$sql1 = $pdo->prepare('запрос');
$sql1->execute;
$result = $sql1->fetch(PDO::FETCH_OBJ);
//вывод
$result->fieldName;
?>
