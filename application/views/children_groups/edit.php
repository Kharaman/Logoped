<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?= validation_errors(); ?>
<form action="/children_groups/edit/<?= $group->id; ?>" method="post">
    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="name" id="name" value="<?= set_value('name', $group->name); ?>">
        <label for="name">Имя группы</label>
    </div>
    <div class="center-align">
        <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
    </div>
</form>
