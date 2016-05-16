<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= validation_errors(); ?>
<form action="/classes_schedule/create" method="post">


<div class="input-field">
    <i class="material-icons prefix">person</i>
    <select name="day" id="">
        <option value="1">Понедельник</option>
        <option value="2">Вторник</option>
        <option value="3">Среда</option>
        <option value="4">Четверг</option>
        <option value="5">Пятница</option>
    </select>
    <label for="">День недели</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="time" value="<?= set_value('time'); ?>" id="time">
    <label for="time">Время</label>
</div>
    
    <p>
    <input type="radio" id="group2" name="type" value="1" checked> <?= set_radio('type', '1'); ?>
        <label for="group1">Групповое</label>
    </p>
    <p>
    <input type="radio" id="group1" name="type" value="1" <?= set_radio('type', '1'); ?>>
    <label for="group2">Индивидуальное</label>
    </p>

    <div class="input-field">
        <select class="c-select browser-default" name="children_id" id="first-select">
        <option value="0">-</option>
        <?php foreach($children as $child): ?>
            <option value="<?= $child->id; ?>">
                <?= $child->full_name; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>
    
    <div class="input-field">
        <select class="c-select browser-default" name="group_number" id="second-select">
        <option value="0">-</option>
        <?php foreach($groups as $group): ?>
            <option value="<?= $group->id; ?>">
                <?= $group->name . ' ' . $group->id; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>
    
    <br>

    <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>
</form>
