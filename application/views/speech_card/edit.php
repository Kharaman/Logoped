<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Карта развития</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?= validation_errors(); ?>
<form action="/speech_card/edit/<?= $card->id; ?>" method="post">
    <table>
        <tr>
            <td>Ф.И.О.</td>
            <td>№ ДОУ</td>
            <td>Дата зачисления в группу</td>
            <td>Жалобы родителей</td>
            <td>Родной язык в семье</td>
            <td>Состояние общей моторики</td>
            <td>Слух</td>
            <td>Общее развитие ребенка</td>
            <td>Внимание</td>
            <td>Работоспособность</td>
            <td>Память</td>
            <td>Голос</td>
            <td>Тембр</td>
            <td>Дыхание</td>
            <td>Артикуляция и дикция</td>
            <td>Голосовые связки</td>
            <td>Зубы</td>
            <td>Губы</td>
            <td>Язык</td>
            <td>Движения</td>
            <td>Прикус</td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="children_id" value="<?= $card->children_id; ?>">
                <select name="" id="" disabled>
                        <option value="">
                            <?= $card->full_name; ?>
                        </option>
                </select>
            </td>
            <td><input type="number" name="peu_number" value="<?= set_value('peu_number', $card->peu_number); ?>"></td>
            <td><input type="text" name="enrollment_date" value="<?= set_value('enrollment_date', $card->enrollment_date); ?>"></td>
            <td><input type="text" name="parent_complaints" value="<?= set_value('parent_complaints', $card->parent_complaints); ?>"></td>
            <td><input type="text" name="native_language" value="<?= set_value('native_language', $card->native_language); ?>"></td>
            <td><input type="text" name="motility_state" value="<?= set_value('motility_state', $card->motility_state); ?>"></td>
            <td><input type="text" name="hearing" value="<?= set_value('hearing', $card->hearing); ?>"></td>
            <td><input type="text" name="general_development" value="<?= set_value('general_development', $card->general_development); ?>"></td>
            <td><input type="text" name="attention" value="<?= set_value('attention', $card->attention); ?>"></td>
            <td><input type="text" name="efficiency" value="<?= set_value('efficiency', $card->efficiency); ?>"></td>
            <td><input type="text" name="memory" value="<?= set_value('memory', $card->memory); ?>"></td>
            <td><input type="text" name="voice" value="<?= set_value('voice', $card->voice); ?>"></td>
            <td><input type="text" name="timbre" value="<?= set_value('timbre', $card->timbre); ?>"></td>
            <td><input type="text" name="breath" value="<?= set_value('breath', $card->breath); ?>"></td>
            <td><input type="text" name="diction" value="<?= set_value('diction', $card->diction); ?>"></td>
            <td><input type="text" name="vocal_cords" value="<?= set_value('vocal_cords', $card->vocal_cords); ?>"></td>
            <td><input type="text" name="teeth" value="<?= set_value('teeth', $card->teeth); ?>"></td>
            <td><input type="text" name="lips" value="<?= set_value('lips', $card->lips); ?>"></td>
            <td><input type="text" name="tongue" value="<?= set_value('tongue', $card->tongue); ?>"></td>
            <td><input type="text" name="movement" value="<?= set_value('movement', $card->movement); ?>"></td>
            <td><input type="text" name="bite" value="<?= set_value('bite', $card->bite); ?>"></td>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
