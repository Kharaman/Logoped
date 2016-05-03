<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список детей - Добавление</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?= validation_errors(); ?>
<h1>Добавление ребенка</h1>
<form action="/children/create/" method="post">
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
            <td><input type="text" name="full_name" value="<?= set_value('full_name'); ?>"</td>
            <td><input type="text" name="date" value="<?= set_value('date'); ?>"</td>
            <td><input type="text" name="address" value="<?= set_value('address'); ?>"</td>
            <td><input type="text" name="date_PMPC" value="<?= set_value('date_PMPC'); ?>"</td>
            <td><input type="text" name="protocol_number" value="<?= set_value('protocol_number'); ?>"</td>
            <td><input type="text" name="group_number" value="<?= set_value('group_number'); ?>"</td>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
