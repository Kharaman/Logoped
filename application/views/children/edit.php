<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <?= validation_errors(); ?>
    <h3 class="center-align">Редактирование списка детей</h3>
    <form action="/children/edit/<?= $child->id; ?>" method="post">
        <div class="input-field">
            <i class="material-icons prefix">persons</i>
            <input type="text" name="full_name" value="<?= set_value('full_name', $child->full_name); ?>" id="full_name">
            <label for="full_name">Ф.И.О.</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">date_range</i>
            <input type="date" class="datepicker" name="date" value="<?= set_value('date', $child->date); ?>" id="date">
            <label for="date">Дата рождения</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">home</i>
            <input type="text" name="address" value="<?= set_value('address', $child->address); ?>" id="address">
            <label for="address">Адресс</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">developer_board</i>
            <input type="date" class="datepicker" name="date_PMPC" value="<?= set_value('date_PMPC', $child->date_PMPC); ?>" id="date_PMPC">
            <label for="date_PMPC">Дата обследования ПМПК</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">format_list_numbered</i>
            <input type="text" name="protocol_number" value="<?= set_value('protocol_number', $child->protocol_number); ?>" id="protocol_number">
            <label for="protocol_number">№ протокола</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">subject</i>
            <select name="group_number" id="group_number">
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id; ?>" <?php if ($group->id == $child->group_number) echo set_select('group_number', $group->id, TRUE); else echo set_select('group_number', $group->id); ?>>
                        <?= $group->id . ' ' . $group->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>№ группы</label>
        </div>
        <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
        </div>
    </form>