<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расписание занятий</title>
</head>
<body>
<?= validation_errors(); ?>
<form action="/classes_schedule/create" method="post">
    <select name="day" id="">
        <option value="1">Понедельник</option>
        <option value="2">Вторник</option>
        <option value="3">Среда</option>
        <option value="4">Четверг</option>
        <option value="5">Пятница</option>
    </select>
    <br>
    <input type="text" name="time" value="<?= set_value('time'); ?>">
    <br>
    <label for="group">Групповое</label>
    <input type="radio" id="group" name="type" value="1" <?= set_radio('type', '1', TRUE); ?>>
    <br>

    <label for="group">Индивидуальное</label>
    <input type="radio" id="group" name="type" value="1" <?= set_radio('type', '1'); ?>>
    <br>
    <select name="children_id">
        <option value="0">-</option>
        <?php foreach($children as $child): ?>
            <option value="<?= $child->id; ?>">
                <?= $child->full_name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <select name="group_number">
        <option value="0">-</option>
        <?php foreach($groups as $group): ?>
            <option value="<?= $group->id; ?>">
                <?= $group->name . ' ' . $group->id; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>

    <input type="submit" value="ok">
    
</form>



</body>
</html>
