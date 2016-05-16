<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h3 class="center-align">Добавление ребенка</h3>
<form action="/children/create/" method="post">
    <div class="input-field">
            <i class="material-icons prefix">persons</i>
            <input type="text" name="full_name" value="<?= set_value('full_name'); ?>" id="full_name">
            <label for="full_name">Ф.И.О.</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">date_range</i>
            <input type="text" name="date" value="<?= set_value('date'); ?>" id="date">
            <label for="date">Дата рождения</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">home</i>
            <input type="text" name="address" value="<?= set_value('address'); ?>" id="address">
            <label for="address">Адресс</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">developer_board</i>
            <input type="text" name="date_PMPC" value="<?= set_value('date_PMPC'); ?>" id="date_PMPC">
            <label for="date_PMPC">Дата обследования ПМПК</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">format_list_numbered</i>
            <input type="text" name="protocol_number" value="<?= set_value('protocol_number'); ?>" id="protocol_number">
            <label for="protocol_number">№ протокола</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix">subject</i>
            <input type="text" name="group_number" value="<?= set_value('group_number'); ?>" id="group_number">
            <label for="group_number">№ группы</label>
        </div>

        <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>
</form>