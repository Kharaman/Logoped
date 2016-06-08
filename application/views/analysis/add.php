<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= validation_errors(); ?>
<form action="/analysis/create" method="post">
    <select name="children_id" id="">
        <?php foreach($children as $child): ?>
            <option value="<?= $child->id; ?>" data-icon="<?php if ($child->photo) echo '/uploads/40x40/' . $child->photo; else echo '/img/profile.png'; ?>" class="circle">
                <?= $child->full_name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="description">Описание:</label><br>
    <textarea id="description" name="description" cols="30" rows="10"><?= set_value('description');?></textarea><br>
    <input type="submit" class="btn" value="ok">
</form>