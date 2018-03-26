<?php

session_start();
$settingsDir = realpath(__DIR__ . '/../settings');
require_once($settingsDir . DIRECTORY_SEPARATOR . 'settings.php');
function getAllUser($DBH)
{
    $STH = $DBH->query('SELECT `email` from burger.users');
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $emailArray = [];
    while ($row = $STH->fetch()) {
        $emailArray[] = $row['email'];
    }
    return $emailArray;
}

function getIdUser($DBH, $email)
{
    if (!$_SESSION['auth']) {
        $STH = $DBH->prepare("SELECT * FROM burger.users WHERE email='$email'");
        $STH->execute();
        $userId = 0;
        while ($row = $STH->fetch()) {
            $userId = $row['id'];
        }
        $_SESSION['auth'] = $userId;
        return $userId;
    }
    return $userId = $_SESSION['auth'];
}

function addOrGetUser($DBH, $email, $emailArray, $name, $phone)
{
    if (!in_array($email, $emailArray)) {
        $STH = $DBH->prepare("INSERT INTO `users` (`name`, `phone`,
    `email`) values ('$name','$phone','$email')");
        $STH->execute();
    }
    return $userId = getIdUser($DBH, $email);
}

function newOrder($DBH, $street, $home, $housing, $apartment, $floor, $comment, $money, $callback, $userId)
{
    $STH = $DBH->prepare("INSERT INTO burger.`order` (`street`, `home`,`housing`,`apartment`,
`floor`,`comment`,`money`,`callback`,`user_id`) 
values ('$street',$home,$housing,$apartment,$floor,'$comment',$money,$callback,$userId)");
    $STH->execute();
}

function numberOrder($DBH, $userId)
{
    $STH = $DBH->prepare("SELECT * FROM burger.`order` WHERE user_id=$userId");
    $STH->execute();
    $countOrder = 1;
    while ($row = $STH->fetch()) {
        $countOrder = $countOrder + 1;
    }
    return $countOrder;
}
