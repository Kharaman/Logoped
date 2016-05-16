<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= validation_errors(); ?>
<form action="/analysis/create" method="post">
    <select name="children_id" id="">
        <?php foreach($children as $child): ?>
            <option value="<?= $child->id; ?>">
                <?= $child->full_name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="description">Описание:</label><br>
    <textarea id="description" name="description" cols="30" rows="10"><?= set_value('description');?></textarea><br>
    <input type="submit" value="ok">
</form>