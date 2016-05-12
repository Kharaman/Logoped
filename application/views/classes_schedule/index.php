<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расписание занятий</title>
    <style>
        .wrapper .active { color: red; };
    </style>
</head>
<body>
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
                            <p><?= $class->time; ?> - Индивидуальное занятие (<a href="/children/edit/<?= $class->children_id; ?>"><?= $class->full_name; ?></a>) (<a
                                    href="/classes_schedule/delete/<?= $class->id; ?>">delete</a>)(<a href="/classes_schedule/edit/<?= $class->id; ?>">edit</a>)</p>
                        <?php else: ?>
                            <p><?= $class->time; ?> - Групповое занятие (<a href="/groups/<?= $class->group_number; ?>">№<?= $class->group_number . ' ' . $class->group_name; ?></a>) (<a
                                    href="/classes_schedule/delete/<?= $class->id; ?>">delete</a>)(<a href="/classes_schedule/edit/<?= $class->id; ?>">edit</a>)</p>
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

<a href="/classes_schedule/create">Добавить занятие</a>
<pre>
    </pre>
<br><br><br>
<br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $(".tab_item").not(":first").hide();
    $(".wrapper .tab").click(function() {
        $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");
</script>
</body>
</html>
