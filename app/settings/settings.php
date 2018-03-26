<?php

$config = include('config.php');
$config = $config['db'];

$host = $config["host"];
$db = $config["dbname"];
$charset = $config["charset"];
$user = $config["user"];
$password = $config["password"];

$dsn = "mysql:host=$host; dbname=$db;charset=$charset";

try {
    $DBH = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Ошибка подключения: ' . $e->getMessage());
}

