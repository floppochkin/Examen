<?php
    $password = '';
    $login = 'root';
    $host = 'localhost';
    $db = 'violations.net.db';
    $dbh='mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dbh,$login,$password);
    
