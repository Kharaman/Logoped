<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?= validation_errors(); ?>
<h3 class="center-align">Добавление индивидуального карты развития</h3>
<form action="/individual_card/create/" method="post">



    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <select name="children_id" id="fio">
                    <?php foreach ($children as $child): ?>
                        <option value="<?= $child->id; ?>" <?= set_select('children_id', $child->id); ?>>
                            <?= $child->full_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
        <label for="">Ф.И.О.</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <select name="is_beginning" id="">
                    <option value="1">На начало года</option>
                    <option value="0">На конец года</option>
                </select>
        <label>Период</label>
    </div>

      <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="pronunciation" value="<?= set_value('pronunciation'); ?>" id="pronunciation">
        <label for="pronunciation">Звукопроизношение</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="syllable_word_structure" value="<?= set_value('syllable_word_structure'); ?>" id="syllable_word_structure">
        <label for="syllable_word_structure">Слоговая структура слова</label>
    </div>

  <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="motility" value="<?= set_value('motility'); ?>" id="motility">
        <label for="motility">Моторика</label>
    </div>

      <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="color_perception" value="<?= set_value('color_perception'); ?>" id="color_perception">
        <label for="color_perception">Восприятие цветов</label>
    </div>
          <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="spatial_perception" value="<?= set_value('spatial_perception'); ?>" id="spatial_perception">
        <label for="spatial_perception">Пространственное восприятие</label>
    </div>

            <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="hidden" name="eyes_count_operations" value="0">
                <input type="checkbox" name="eyes_count_operations" value="1" <?= set_checkbox('eyes_count_operations', '1'); ?> id="eyes_count_operations">
        <label for="eyes_count_operations">Счетные операции глазами</label>
    </div>
    <div class="input-field">
        <i class="material-icons prefix">person</i>
        <input type="text" name="items_compare" value="<?= set_value('items_compare'); ?>" id="items_compare">
        <label for="items_compare">Сравнение предметов</label>
    </div>

<div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>
</form>