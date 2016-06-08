<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h1>Добавление речевого экрана</h1>
<form action="/speech_screen/create/" method="post">

 <div class="input-field">
    <i class="material-icons prefix">person</i>
    <select name="children_id" id="fio">
    <option value="" disabled selected>Выберите ребенка</option>
        <?php foreach ($children as $child): ?>
            <option value="<?= $child->id; ?>" <?= set_select('children_id', $child->id);?> data-icon="<?php if ($child->photo) echo '/uploads/40x40/' . $child->photo; else echo '/img/profile.png'; ?>" class="circle">
                <?= $child->full_name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label>Ф.И.О.</label>
  </div>

<div class="input-field">
            <i class="material-icons prefix">record_voice_over</i>
            <input type="text" name="ff_perception" value="<?= set_value('ff_perception'); ?>" id="ff_perception">
            <label for="ff_perception">ФФ. восприятие</label>
    </div>

<div class="input-field">
            <i class="material-icons prefix">update</i>
            <input type="number" name="study_year" value="<?= set_value('study_year'); ?>" id="study_year">
            <label for="study_year">Год обучения</label>
    </div>

    <div class="input-field">
            <i class="material-icons prefix">portrait</i>
            <input type="text" name="diagnosis" value="<?= set_value('diagnosis'); ?>" id="diagnosis">
            <label for="diagnosis">Диагноз</label>
    </div>

   <?php foreach ($sounds as $sound): ?>
    <div class="input-field col s2">
        <select name="sound_<?= $sound->id; ?>" id="">
            <?php foreach ($progress as $mark): ?>
                <option value="<?= $mark->id; ?>" <?= set_select('sound_' . $sound->id, $mark->id); ?>>
                    <?= $mark->symbol; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for=""><?= $sound->name; ?></label>
        </div>
<?php endforeach; ?>
    <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>
</form>