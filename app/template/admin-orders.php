<?php

$modelsDir = realpath(__DIR__ . '/../models');
require_once($modelsDir . DIRECTORY_SEPARATOR . 'admin-models.php');
$orders = getAllOrder($DBH);

echo "<h2>Список заказов</h2>";
foreach ($orders as $order) {
    echo '<table width="40%" border="1px solid black" cellspacing="0" cellpadding="0">';
    foreach ($order as $key => $value) {
        if ($key == 'money') {
            if ($value == 1) {
                echo "<tr>
                <td width = '30%'>$key</td>
                <td>Необходима сдача</td>
               </tr>";
            } else {
                echo "<tr>
                <td width = '30%'>$key</td>
                <td>Оплата по карте</td>
               </tr>";
            }
            continue;
        }
        if ($key == 'callback') {
            if ($value == 1) {
                echo "<tr>
                <td width = '30%'>$key</td>
                <td>Не перезванивать</td>
               </tr>";
            } else {
                echo "<tr>
                <td width = '30%'>$key</td>
                <td>Перезвонить</td>
               </tr>";
            }
            continue;
        }
        echo "<tr>
                <td width = '30%'>$key</td>
                <td>$value</td>
               </tr>";
    }
    echo "</table>";
    echo "<br>";
}
