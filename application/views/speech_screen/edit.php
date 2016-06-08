<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h1>Редактирование речевого экрана</h1>
<form action="/speech_screen/edit/<?= $screen['id']; ?>" method="post">
<div class="input-field">
    <i class="material-icons prefix">person</i>
    <select class="" id="fio" disabled>
                    <option value="">
                        
                    </option>
                </select>
                <input type="hidden" name="children_id" value="<?= $screen['children_id']; ?>">
                <input type="hidden" name="id" value="<?= $screen['id']; ?>">
    <label><?= $screen['full_name']; ?></label>
  </div>

<div class="input-field">
            <i class="material-icons prefix">record_voice_over</i>
            <input type="text" name="ff_perception" value="<?= set_value('ff_perception', $screen['ff_perception']); ?>" id="ff_perception">
            <label for="ff_perception">ФФ. восприятие</label>
    </div>

<div class="input-field">
            <i class="material-icons prefix">update</i>
            <input type="number" name="study_year" value="<?= set_value('study_year', $screen['study_year']); ?>" id="study_year">
            <label for="study_year">Год обучения</label>
    </div>

    <div class="input-field">
            <i class="material-icons prefix">portrait</i>
            <input type="text" name="diagnosis" value="<?= set_value('diagnosis', $screen['diagnosis']); ?>" id="diagnosis">
            <label for="diagnosis">Диагноз</label>
    </div>
        <table class="centered">
        <tr class="border-row">
            <?php foreach ($sounds as $sound): ?>
                <td><?= $sound->name; ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($sounds as $sound): ?>
                <td>
                    <select class="c-select browser-default" name="sound_<?= $sound->id; ?>" id="">
                        <?php foreach ($progress as $mark): ?>
                            <option value="<?= $mark->id; ?>"<?php if ($mark->id == $screen['sounds'][$sound->id]['progress_id']):?> selected <?php endif;?>>
                                <?= $mark->symbol; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>

  
    <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
        </div>






</form>