<?php
    $password = '';
    $login = 'root';
    $host = 'localhost';
    $db = 'Examen3';
    $dbh='mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dbh,$login,$password);
    
