<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<a class="btn-add btn-floating waves-effect waves-light" href="/work_schedule/create/"><i class="material-icons">add</i></a><table>
<table>
    <tr class="border-row">
        <td></td>
        <td>Начало рабочего дня</td>
        <td>Конец рабочего дня</td>
        <td></td>
        <td></td>

    </tr>
    <?php foreach ($schedule as $row)
    {
        switch ($row->day)
        {
            case 1: ?>
                <tr>
                    <td>Понедельник</td>
                    <td><?= $row->start_time; ?></td>
                    <td><?= $row->end_time; ?></td>
                    <td><a href="/work_schedule/edit/<?= $row->id; ?>"><i class="material-icons tools">edit</i></a></td>
                    <td><a href="/work_schedule/delete/<?= $row->id; ?>"><i class="material-icons tools">close</i></a></td>
                </tr>
        <?php break;
            case 2: ?>
                <tr>
                    <td>Вторник</td>
                    <td><?= $row->start_time; ?></td>
                    <td><?= $row->end_time; ?></td>
                    <td><a href="/work_schedule/edit/<?= $row->id; ?>"><i class="material-icons tools">edit</i></a></td>
                    <td><a href="/work_schedule/delete/<?= $row->id; ?>"><i class="material-icons tools">close</i></a></td>
                </tr>
            <?php break;
            case 3: ?>
                <tr>
                    <td>Среда</td>
                    <td><?= $row->start_time; ?></td>
                    <td><?= $row->end_time; ?></td>
                    <td><a href="/work_schedule/edit/<?= $row->id; ?>"><i class="material-icons tools">edit</i></a></td>
                    <td><a href="/work_schedule/delete/<?= $row->id; ?>"><i class="material-icons tools">close</i></a></td>
                </tr>
            <?php break;
            case 4: ?>
                <tr>
                    <td>Четверг</td>
                    <td><?= $row->start_time; ?></td>
                    <td><?= $row->end_time; ?></td>
                    <td><a href="/work_schedule/edit/<?= $row->id; ?>"><i class="material-icons tools">edit</i></a></td>
                    <td><a href="/work_schedule/delete/<?= $row->id; ?>"><i class="material-icons tools">close</i></a></td>
                </tr>
            <?php break;
            case 5: ?>
                <tr>
                    <td>Пятница</td>
                    <td><?= $row->start_time; ?></td>
                    <td><?= $row->end_time; ?></td>
                    <td><a href="/work_schedule/edit/<?= $row->id; ?>"><i class="material-icons tools">edit</i></a></td>
                    <td><a href="/work_schedule/delete/<?= $row->id; ?>"><i class="material-icons tools">close</i></a></td>
                </tr>
            <?php break;
        }
    }
    ?>

</table>

