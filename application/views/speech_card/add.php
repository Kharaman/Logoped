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
<form action="/speech_card/create" method="post">
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
                <select name="children_id" id="">
                    <?php foreach($children as $child): ?>
                        <option value="<?= $child->id; ?>">
                            <?= $child->full_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input type="number" name="peu_number" value="<?= set_value('peu_number'); ?>"></td>
            <td><input type="text" name="enrollment_date" value="<?= set_value('enrollment_date'); ?>"></td>
            <td><input type="text" name="parent_complaints" value="<?= set_value('parent_complaints'); ?>"></td>
            <td><input type="text" name="native_language" value="<?= set_value('native_language'); ?>"></td>
            <td><input type="text" name="motility_state" value="<?= set_value('motility_state'); ?>"></td>
            <td><input type="text" name="hearing" value="<?= set_value('hearing'); ?>"></td>
            <td><input type="text" name="general_development" value="<?= set_value('general_development'); ?>"></td>
            <td><input type="text" name="attention" value="<?= set_value('attention'); ?>"></td>
            <td><input type="text" name="efficiency" value="<?= set_value('efficiency'); ?>"></td>
            <td><input type="text" name="memory" value="<?= set_value('memory'); ?>"></td>
            <td><input type="text" name="voice" value="<?= set_value('voice'); ?>"></td>
            <td><input type="text" name="timbre" value="<?= set_value('timbre'); ?>"></td>
            <td><input type="text" name="breath" value="<?= set_value('breath'); ?>"></td>
            <td><input type="text" name="diction" value="<?= set_value('diction'); ?>"></td>
            <td><input type="text" name="vocal_cords" value="<?= set_value('vocal_cords'); ?>"></td>
            <td><input type="text" name="teeth" value="<?= set_value('teeth'); ?>"></td>
            <td><input type="text" name="lips" value="<?= set_value('lips'); ?>"></td>
            <td><input type="text" name="tongue" value="<?= set_value('tongue'); ?>"></td>
            <td><input type="text" name="movement" value="<?= set_value('movement'); ?>"></td>
            <td><input type="text" name="bite" value="<?= set_value('bite'); ?>"></td>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
