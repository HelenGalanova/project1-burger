<?php

$modelsDir = realpath(__DIR__ . '/../models');
require_once($modelsDir . DIRECTORY_SEPARATOR . 'admin-models.php');

$users = getAllUser($DBH);

echo "<h2>Список пользователей</h2>";
foreach ($users as $user) {
    echo '<table width="40%" border="1px solid black" cellspacing="0" cellpadding="0">';
    foreach ($user as $key => $value) {
        echo "<tr>
                <td width = '30%'>$key</td>
                <td>$value</td>
               </tr>";
    }
    echo "</table>";
    echo "<br>";
}

