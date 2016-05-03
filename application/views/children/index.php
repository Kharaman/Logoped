<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список детей</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Список детей</h1>
    <a href="/children/create/">Add</a>
    <table>
        <tr>
            <td>Ф.И.О.</td>
            <td>Дата рождения</td>
            <td>Адресс</td>
            <td>Дата обследования ПМПК</td>
            <td>№ протокола</td>
            <td>№ группы</td>
        </tr>
        <?php foreach ($children as $child): ?>
            <tr>
                <td><?= $child->full_name; ?></td>
                <td><?= $child->date; ?></td>
                <td><?= $child->address; ?></td>
                <td><?= $child->date_PMPC; ?></td>
                <td><?= $child->protocol_number; ?></td>
                <td><?= $child->group_number; ?></td>
                <td><a href="/children/edit/<?= $child->id; ?>">Edit</a></td>
                <td><a href="/children/delete/<?= $child->id; ?>">x</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
