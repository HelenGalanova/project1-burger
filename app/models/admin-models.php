<?php

$settingsDir = realpath(__DIR__ . '/../settings');
require_once($settingsDir . DIRECTORY_SEPARATOR . 'settings.php');

function getAllUser($DBH)
{
    $users = $DBH->query('SELECT * FROM burger.users')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getAllOrder($DBH)
{
    $orders = $DBH->query('SELECT * FROM burger.order')->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}
