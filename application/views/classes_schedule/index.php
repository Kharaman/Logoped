<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<a class="btn-add btn-floating waves-effect waves-light" href="/classes_schedule/create/"><i class="material-icons">add</i></a>
<div class="wrapper">
    <div class="tabs">
        <span class="tab">Понедельник</span>
        <span class="tab">Вторник</span>
        <span class="tab">Среда</span>
        <span class="tab">Четверг</span>
        <span class="tab">Пятница</span>
    </div>
    <div class="tab_content">
        <?php for($i = 1; $i <= 5; $i++): ?>
            <div class="tab_item">
                <?php
                if (isset($classes[$i]))
                {
                    foreach ($classes[$i] as $class)
                    {
                        if ($class->children_id !== NULL): ?>
                            <p class="p-item"><?= $class->time; ?> - Индивидуальное занятие (<a href="/children/edit/<?= $class->children_id; ?>"><?= $class->full_name; ?></a>) <a class="p-link"
                                    href="/classes_schedule/delete/<?= $class->id; ?>"><i class="material-icons tools">close</i></a><a class="p-link" href="/classes_schedule/edit/<?= $class->id; ?>"><i class="material-icons tools">edit</i></a></p>
                        <?php else: ?>
                            <p class="p-item"><?= $class->time; ?> - Групповое занятие (<a href="/groups/<?= $class->group_number; ?>">№<?= $class->group_number . ' ' . $class->group_name; ?></a>) <a class="p-link" 
                                    href="/classes_schedule/delete/<?= $class->id; ?>"><i class="material-icons tools">close</i></a><a class="p-link" href="/classes_schedule/edit/<?= $class->id; ?>"><i class="material-icons tools">edit</i></a></p>
                        <?php endif; ?>
                    <?php }
                }
                else
                {
                    echo 'Занятий на этот день еще не добавлено';
                }
                ?>
            </div>
        <?php endfor; ?>
    </div>

</div>

<pre>
    </pre>
<br><br><br>
<br><br><br>

