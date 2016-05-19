<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<?php if (isset($error)) echo $error; ?>
<form action="/work_schedule/create" method="post">
    <table>
        <tr class="border-row">
            <td>День недели</td>
            <td>Начало рабочего дня</td>
            <td>Конец рабочего дня</td>
        </tr>
        <tr>
            <td>
                <select name="day" id="">
                    <option value="1">Понедельник</option>
                    <option value="2">Вторник</option>
                    <option value="3">Среда</option>
                    <option value="4">Четверг</option>
                    <option value="5">Пятница</option>
                </select>
            </td>
            <td><input type="text" class="timepicker" name="start_time" value="<?= set_value('start_time'); ?>"></td>
            <td><input type="text" class="timepicker" name="end_time" value="<?= set_value('end_time'); ?>"></td>
        </tr>
    </table>
<div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div></form>