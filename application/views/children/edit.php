<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список детей - Редактирование</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?= validation_errors(); ?>
    <h1>Редактирование списка детей</h1>
    <form action="/children/edit/<?= $child->id; ?>" method="post">
        <table>
            <tr>
                <td>Ф.И.О.</td>
                <td>Дата рождения</td>
                <td>Адресс</td>
                <td>Дата обследования ПМПК</td>
                <td>№ протокола</td>
                <td>№ группы</td>
            </tr>
            <tr>
                <td><input type="text" name="full_name" value="<?= set_value('full_name', $child->full_name); ?>"</td>
                <td><input type="text" name="date" value="<?= set_value('date', $child->date); ?>"</td>
                <td><input type="text" name="address" value="<?= set_value('address', $child->address); ?>"</td>
                <td><input type="text" name="date_PMPC" value="<?= set_value('date_PMPC', $child->date_PMPC); ?>"</td>
                <td><input type="text" name="protocol_number" value="<?= set_value('protocol_number', $child->protocol_number); ?>"</td>
                <td><input type="text" name="group_number" value="<?= set_value('group_number', $child->group_number); ?>"</td>
            </tr>
        </table>
        <input type="submit" value="OK">
    </form>
</body>
</html>
