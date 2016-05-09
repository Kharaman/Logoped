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
<h1>Добавление речевого экрана</h1>
<form action="/speech_screen/create/" method="post">
    <table>
        <tr>
            <td>Ф.И.О.</td>
            <td>ФФ. восприятие</td>
            <td>Год обучения</td>
            <td>Диагноз</td>
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
            <td><input type="text" name="ff_perception" value="<?= set_value('ff_perception'); ?>"></td>
            <td><input type="text" name="study_year" value="<?= set_value('study_year'); ?>"></td>
            <td><input type="text" name="diagnosis" value="<?= set_value('diagnosis'); ?>"></td>
            <?php foreach ($sounds as $sound): ?>
                <td>
                    <select name="sound_<?= $sound->id; ?>" id="">
                        <?php foreach ($progress as $mark): ?>
                            <option value="<?= $mark->id; ?>" <?= set_select('sound_' . $sound->id, $mark->id); ?>>
                                <?= $mark->symbol; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
