<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= validation_errors(); ?>
<form action="/work_schedule/edit/<?= $schedule->id; ?>" method="post">
    <table>
        <tr class="border-row">
            <td>День недели</td>
            <td>Начало рабочего дня</td>
            <td>Конец рабочего дня</td>
        </tr>
        <tr>
            <td>
                <select disabled>
                    <option <?php if ($schedule->day == 1) echo 'selected';?>>Понедельник</option>
                    <option <?php if ($schedule->day == 2) echo 'selected';?>>Вторник</option>
                    <option <?php if ($schedule->day == 3) echo 'selected';?>>Среда</option>
                    <option <?php if ($schedule->day == 4) echo 'selected';?>>Четверг</option>
                    <option <?php if ($schedule->day == 5) echo 'selected';?>>Пятница</option>
                </select>
                <input type="hidden" name="day" value="<?= $schedule->day; ?>">
            </td>
            <td><input type="text" class="timepicker" name="start_time" value="<?= set_value('start_time', $schedule->start_time); ?>"></td>
            <td><input type="text" class="timepicker" name="end_time" value="<?= set_value('end_time', $schedule->end_time); ?>"></td>
        </tr>
    </table>
<div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">редактировать</button>
        </div></form>