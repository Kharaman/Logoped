<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h3 class="center-align">Добавление индивидуального карты развития</h3>
<form action="/individual_card/edit/<?= $card->id; ?>" method="post">

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="hidden" name="children_id" value="<?= $card->children_id; ?>">
        <select id="fio" disabled="">
                <option value="">
                    <?= $card->full_name; ?>
                </option>
        </select>
        <label for="">Ф.И.О.</label>
    </div>
    
    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="hidden" name="is_beginning" value="<?= $card->is_beginning; ?>">
                <select id="" disabled>
                    <?php if ($card->is_beginning): ?>
                        <option>На начало года</option>
                    <?php else: ?>
                        <option>На конец года</option>
                    <?php endif; ?>
                </select>
        <label for="">Период</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="pronunciation" value="<?= set_value('pronunciation', $card->pronunciation); ?>" id="pronunciation">
        <label for="pronunciation">Звукопроизношение</label>
    </div>

     <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="syllable_word_structure" value="<?= set_value('syllable_word_structure', $card->syllable_word_structure); ?>" id="syllable_word_structure">
        <label for="syllable_word_structure">Слоговая структура слова</label>
    </div>

   <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="motility" value="<?= set_value('motility', $card->motility); ?>" id="motility">
        <label for="motility">Моторика</label>
    </div>

<div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="color_perception" value="<?= set_value('color_perception', $card->color_perception); ?>" id="color_perception">
        <label for="color_perception">Восприятие цветов</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="spatial_perception" value="<?= set_value('spatial_perception', $card->spatial_perception); ?>" id="spatial_perception">
        <label for="spatial_perception">Пространственное восприятие</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="hidden" name="eyes_count_operations" value="0">
                <input type="checkbox" name="eyes_count_operations" value="1" <?php if ($card->eyes_count_operations) echo set_checkbox('eyes_count_operations', '1', TRUE); ?> id="eyes_count_operations">
        <label for="eyes_count_operations">Счетные операции глазами</label>
    </div>

     <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="items_compare" value="<?= set_value('items_compare', $card->items_compare); ?>">
        <label for="eyes_count_operations">Сравнение предметов</label>
    </div>
<div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Редактировать</button>
        </div>
</form>
