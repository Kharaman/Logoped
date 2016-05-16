<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= validation_errors(); ?>
<h3 clas="center-align">Редактирование индивидуального плана развития</h3>
<form action="/individual_plan/edit/<?= $plan['id']; ?>" method="post">
<div class="input-field">
    <i class="material-icons prefix">person</i>
    <select disabled>
        <option value="">
            <?= $plan['full_name']; ?>
        </option>
    </select>
    <input type="hidden" name="children_id" value="<?= $plan['children_id']; ?>">
    <input type="hidden" name="id" value="<?= $plan['id']; ?>">
    <label><?= $plan['full_name']; ?></label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="whistling" value="<?= set_value('whistling', $plan['whistling']); ?>" id="whistling">
    <label for="whistling">Свистящие</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="hissing" value="<?= set_value('hissing', $plan['hissing']); ?>" id="hissing">
    <label for="hissing">Шипящие</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="sonor" value="<?= set_value('sonor', $plan['sonor']); ?>" id="sonor">
    <label for="sonor">Соноры</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="affricate" value="<?= set_value('affricate', $plan['affricate']); ?>">
    <label for="sonor">Африкаты</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="other_sounds" value="<?= set_value('other_sounds', $plan['other_sounds']); ?>" id="other_sounds">
    <label for="other_sounds">Другие звуки</label>
</div>



        <div class="row">
            <?php foreach ($sounds as $sound): ?>
                <p class="col s2">
                        <input type="hidden" name="sound_<?= $sound->id; ?>" value="0">
                        <?php if ($plan['sounds'][$sound->id]['is_done']  == 1): ?>
                            <input type="checkbox" name="sound_<?= $sound->id; ?>" value="1" id="sound_<?= $sound->id; ?>" checked>
                            <label for="sound_<?= $sound->id; ?>"><?= $sound->name; ?></label>
                        <?php else: ?>
                            <input type="checkbox" name="sound_<?= $sound->id; ?>" value="1" id="sound_<?= $sound->id; ?>">
                            <label for="sound_<?= $sound->id; ?>"><?= $sound->name; ?></label>
                        <?php endif; ?>
                </p>
            <?php endforeach; ?>
        </div>
     <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
        </div>
</form>