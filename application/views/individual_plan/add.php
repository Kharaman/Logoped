<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h3 class="center-align">Добавление индивидуального плана развития</h3>
<form action="/individual_plan/create/" method="post">

<div class="input-field">
    <i class="material-icons prefix">person</i>
     <select name="children_id" id="fio">
                    <?php foreach ($children as $child): ?>
                        <option value="<?= $child->id; ?>" <?= set_select('children_id', $child->id); ?>>
                            <?= $child->full_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
    <label>Ф.И.О.</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="whistling" value="<?= set_value('whistling'); ?>" id="whistling">
    <label for="whistling">Свистящие</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="hissing" value="<?= set_value('hissing'); ?>" id="hissing">
    <label for="hissing">Шипящие</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="sonor" value="<?= set_value('sonor'); ?>" id="sonor">
    <label for="sonor">Соноры</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="affricate" value="<?= set_value('affricate'); ?>">
    <label for="sonor">Африкаты</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="other_sounds" value="<?= set_value('other_sounds'); ?>" id="other_sounds">
    <label for="other_sounds">Другие звуки</label>
</div>



        <div class="row">
            <?php foreach ($sounds as $sound): ?>
                <p class="col s2">
                    <input type="hidden" name="sound_<?= $sound->id; ?>" value="0">
                    <input type="checkbox" id="sound_<?= $sound->id; ?>" name="sound_<?= $sound->id; ?>" value="1" <?= set_checkbox('sound_' . $sound->id, '1'); ?>>
                    <label for="sound_<?= $sound->id; ?>"><?= $sound->name; ?></label>
                </p>
            <?php endforeach; ?>
        </div>
     <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>




</form>
