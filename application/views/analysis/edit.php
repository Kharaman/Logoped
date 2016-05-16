<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= validation_errors(); ?>
<form action="/analysis/edit/<?= $analysis->id; ?>" method="post">
    <input type="hidden" name="children_id" value="<?= $analysis->children_id; ?>">
    <div class="input-field">
    	<i class="material-icons prefix">person</i>
	    <textarea id="description" name="description" class="materialize-textarea"><?= set_value('description', $analysis->description);?></textarea>
	    <label for="description">Описание:</label><br>
	</div>
    <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
        </div>
</form>