<?php

$modelsDir = realpath(__DIR__ . '/../models');
$controllersDir = realpath(__DIR__ . '');

require_once($modelsDir . DIRECTORY_SEPARATOR . 'models.php');
require_once($controllersDir . DIRECTORY_SEPARATOR . 'mail.php');

function orderAddSendEmail($DBH)
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $housing = $_POST['part'];
    $apartment = $_POST['appt'];
    $floor = $_POST['floor'];
    $comment = $_POST['comment'];
    $money = $_POST['payment'];
    $callback = $_POST['callback'];

    if (!$callback) {
        $callback = 0;
    }

    if (ctype_digit($home) and ctype_digit($housing) and ctype_digit($apartment) and ctype_digit($floor)) {
        $emailArray = getAllUser($DBH);
        $userId = addOrGetUser($DBH, $email, $emailArray, $name, $phone);
        $countOrder = numberOrder($DBH, $userId);
        $mail = sendMail($countOrder, $name, $phone, $email, $street, $home, $housing, $apartment, $floor,
            $comment, $money, $callback);
        $data = [];
        if ($mail) {
            $data['status'] = "OK";
            $data['mes'] = "Ваш заказ принят!";
            newOrder($DBH, $street, $home, $housing, $apartment, $floor, $comment,
                $money, $callback, $userId);
        } else {
            $data['status'] = "No";
            $data['mes'] = 'Ошибка на сервере';
        }
        echo json_encode($data);
    } else {
        $data['status'] = "No";
        $data['mes'] = 'Дом, корпус, квартира вводить цифрами';
        echo json_encode($data);
    }
}

orderAddSendEmail($DBH);