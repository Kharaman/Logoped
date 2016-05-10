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
<h1>Добавление индивидуального плана развития</h1>
<form action="/individual_plan/create/" method="post">
    <table>
        <tr>
            <td>Ф.И.О.</td>
            <td>Свистящие</td>
            <td>Шипящие</td>
            <td>Соноры</td>
            <td>Африкаты</td>
            <td>Другие звуки</td>
            <?php foreach ($sounds as $sound): ?>
                <td><?= $sound->name; ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>
                <select name="children_id" id="fio">
                    <?php foreach ($children as $child): ?>
                        <option value="<?= $child->id; ?>" <?= set_select('children_id', $child->id); ?>>
                            <?= $child->full_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input type="text" name="whistling" value="<?= set_value('whistling'); ?>"></td>
            <td><input type="text" name="hissing" value="<?= set_value('hissing'); ?>"></td>
            <td><input type="text" name="sonor" value="<?= set_value('sonor'); ?>"></td>
            <td><input type="text" name="affricate" value="<?= set_value('affricate'); ?>"></td>
            <td><input type="text" name="other_sounds" value="<?= set_value('other_sounds'); ?>"></td>
            <?php foreach ($sounds as $sound): ?>
                <td>
                    <input type="hidden" name="sound_<?= $sound->id; ?>" value="0">
                    <input type="checkbox" name="sound_<?= $sound->id; ?>" value="1" <?= set_checkbox('sound_' . $sound->id, '1'); ?>>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
