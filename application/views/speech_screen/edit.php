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
<h1>Редактирование речевого экрана</h1>
<form action="/speech_screen/edit/<?= $screen['id']; ?>" method="post">

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
                <select id="fio" disabled>
                        <option value="">
                            <?= $screen['full_name']; ?>
                        </option>
                </select>
                <input type="hidden" name="children_id" value="<?= $screen['children_id']; ?>">
                <input type="hidden" name="id" value="<?= $screen['id']; ?>">
            </td>
            <td><input type="text" name="ff_perception" value="<?= set_value('ff_perception', $screen['ff_perception']); ?>"></td>
            <td><input type="text" name="study_year" value="<?= set_value('study_year', $screen['study_year']); ?>"></td>
            <td><input type="text" name="diagnosis" value="<?= set_value('diagnosis', $screen['diagnosis']); ?>"></td>
            <?php foreach ($sounds as $sound): ?>
                <td>
                    <select name="sound_<?= $sound->id; ?>" id="">
                        <?php foreach ($progress as $mark): ?>
                            <option value="<?= $mark->id; ?>"<?php if ($mark->id == $screen['sounds'][$sound->id]['progress_id']):?> selected <?php endif;?>>
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
