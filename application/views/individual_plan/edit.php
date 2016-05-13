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
<form action="/individual_plan/edit/<?= $plan['id']; ?>" method="post">
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
                <select disabled>
                    <option value="">
                        <?= $plan['full_name']; ?>
                    </option>
                </select>
                <input type="hidden" name="children_id" value="<?= $plan['children_id']; ?>">
                <input type="hidden" name="id" value="<?= $plan['id']; ?>">
            </td>
            <td><input type="text" name="whistling" value="<?= set_value('whistling', $plan['whistling']); ?>"></td>
            <td><input type="text" name="hissing" value="<?= set_value('hissing', $plan['hissing']); ?>"></td>
            <td><input type="text" name="sonor" value="<?= set_value('sonor', $plan['sonor']); ?>"></td>
            <td><input type="text" name="affricate" value="<?= set_value('affricate', $plan['affricate']); ?>"></td>
            <td><input type="text" name="other_sounds" value="<?= set_value('other_sounds', $plan['other_sounds']); ?>"></td>
            <?php foreach ($sounds as $sound): ?>
                <td>
                        <input type="hidden" name="sound_<?= $sound->id; ?>" value="0">
                        <?php if ($plan['sounds'][$sound->id]['is_done']  == 1): ?>
                            <input type="checkbox" name="sound_<?= $sound->id; ?>" value="1" checked>
                        <?php else: ?>
                            <input type="checkbox" name="sound_<?= $sound->id; ?>" value="1">
                        <?php endif; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
