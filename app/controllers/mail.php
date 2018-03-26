<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 11.03.2018
 * Time: 14:35
 */
function sendMail($countOrder, $name, $phone, $email, $street, $home, $housing, $apartment, $floor,
                  $comment, $money, $callback)
{
    if ($money) {
        $money = 'Потребуется сдача';
    } else {
        $money = 'Оплата по карте';
    }
    if ($callback) {
        $callback = 'ДА';
    } else {
        $callback = 'НЕТ';
    }
    if ($countOrder == 1) {
        $numberOrder = 'Спасибо - это ваш первый заказ';
    } else {
        $numberOrder = "Спасибо! Это уже $countOrder заказ";
    }
    $mail_message = '
        <html>
            <head>
                <title>Заявка</title>
            </head>
            <body>
                <h2>Заказ</h2>
                <h3>DarkBeefBurger за 500 рублей, 1 шт</h3>
                <ul>
                    <li>Имя: ' . $name . '</li>
                    <li>Телефон: ' . $phone . '</li>
                    <li>Телефон: ' . $email . '</li>
                    <li>Улица: ' . $street . '</li>
                    <li>Дом: ' . $home . '</li>
                    <li>Корпус: ' . $housing . '</li>
                    <li>Квартира: ' . $apartment . '</li>
                    <li>Этаж: ' . $floor . '</li>
                    <li>Комментарий: ' . $comment . '</li>
                    <li>Оплата: ' . $money . '</li>
                    <li>Перезвонить: ' . $callback . '</li>                   
                </ul>
                <b> ' . $numberOrder . '</b>
            </body>
        </html>    
        ';
    $headers = "From: Администратор сайта <admin@burgers.com>\r\n" .
        "MIME-Version: 1.0" . "\r\n" .
        "Content-type: text/html; charset=UTF-8" . "\r\n";
    return $mail = mail('dimaanisov24@gmail.com', 'Заказ', $mail_message, $headers);
}
