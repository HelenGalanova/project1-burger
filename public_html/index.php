<?php
// начинаем работать с сессией
session_start();

$appDir = realpath(__DIR__ . '/../app');

// стартовая страница
if ($_SERVER['REQUEST_URI'] == "/") {
    require_once($appDir . DIRECTORY_SEPARATOR . 'template/template.php');
    return 0;
}

// добавляем в базу
if (!empty($_POST) && $_SERVER['REQUEST_URI'] == "/order/add") {
    require_once($appDir . DIRECTORY_SEPARATOR . 'controllers/form.php');
    return 0;
}

// просмотр пользователей (административная панель)
if ($_SERVER['REQUEST_URI'] == "/admin/users" or $_SERVER['REQUEST_URI'] == "/admin/users/") {
    require_once($appDir . DIRECTORY_SEPARATOR . 'template/admin-users.php');
    return 0;
}

// просмотр заказов (административная панель)
if ($_SERVER['REQUEST_URI'] == "/admin/orders" or $_SERVER['REQUEST_URI'] == "/admin/orders/") {
    require_once($appDir . DIRECTORY_SEPARATOR . 'template/admin-orders.php');
    return 0;
}

// такой страницы нет
if ($_SERVER['REQUEST_URI']) {
    header("HTTP/1.0 404 Not Found");
    echo 'Такая страница не существует!';
}

