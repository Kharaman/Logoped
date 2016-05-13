<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить кар</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?= validation_errors(); ?>
<h1>Добавление индивидуального карты развития</h1>
<form action="/individual_card/create/" method="post">
    <table>
        <tr>
            <td>Ф.И.О.</td>
            <td>Период</td>
            <td>Звукопроизношение</td>
            <td>Слоговая структура слова</td>
            <td>Моторика</td>
            <td>Восприятие цветов</td>
            <td>Пространственное восприятие</td>
            <td>Счетные операции глазами</td>
            <td>Сравнение предметов</td>
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
            <td>
                <select name="is_beginning" id="">
                    <option value="1">На начало года</option>
                    <option value="0">На конец года</option>
                </select>
            </td>
            <td><input type="text" name="pronunciation" value="<?= set_value('pronunciation'); ?>"></td>
            <td><input type="text" name="syllable_word_structure" value="<?= set_value('syllable_word_structure'); ?>"></td>
            <td><input type="text" name="motility" value="<?= set_value('motility'); ?>"></td>
            <td><input type="text" name="color_perception" value="<?= set_value('color_perception'); ?>"></td>
            <td><input type="text" name="spatial_perception" value="<?= set_value('spatial_perception'); ?>"></td>
            <td>
                <input type="hidden" name="eyes_count_operations" value="0">
                <input type="checkbox" name="eyes_count_operations" value="1" <?= set_checkbox('eyes_count_operations', '1'); ?>>
            </td>
            <td><input type="text" name="items_compare" value="<?= set_value('items_compare'); ?>"></td>
        </tr>
    </table>
    <input type="submit" value="OK">
</form>
</body>
</html>
