<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= validation_errors(); ?>
<form action="/speech_card/create" method="post">

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <select name="children_id" id="">
                    <?php foreach($children as $child): ?>
                        <option value="<?= $child->id; ?>">
                            <?= $child->full_name; ?>
                        </option>
                    <?php endforeach; ?>
    </select>
    <label>Ф.И.О.</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="number" name="peu_number" value="<?= set_value('peu_number'); ?>"id ="peu_number">
    <label for="peu_number">№ ДОУ</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="date" class="datepicker" name="enrollment_date" value="<?= set_value('enrollment_date'); ?>" id="enrollment_date">
    <label for="enrollment_date">Дата зачисления в группу</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="parent_complaints" value="<?= set_value('parent_complaints'); ?>" id="parent_complaints">
    <label for="parent_complaints">Жалобы родителей</label>
</div>


<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="native_language" value="<?= set_value('native_language'); ?>" id="native_language">
    <label for="native_language">Родной язык в семье</label>
</div>


<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="motility_state" value="<?= set_value('motility_state'); ?>" id="motility_state">
    <label for="motility_state">Состояние общей моторики</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="hearing" value="<?= set_value('hearing'); ?>" id="hearing">
    <label for="hearing">Слух</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="general_development" value="<?= set_value('general_development'); ?>" id="general_development">
    <label for="general_development">Общее развитие ребенка</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="attention" value="<?= set_value('attention'); ?>" id="attention">
    <label for="attention">Внимание</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="efficiency" value="<?= set_value('efficiency'); ?>" id="efficiency">
    <label for="efficiency">Работоспособность</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="memory" value="<?= set_value('memory'); ?>" id="memory">
    <label for="memory">Память</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="voice" value="<?= set_value('voice'); ?>" id="voice">
    <label for="voice">Голос</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="timbre" value="<?= set_value('timbre'); ?>">
    <label for="timbre">Тембр</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="breath" value="<?= set_value('breath'); ?>">
    <label for="breath">Дыхание</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="diction" value="<?= set_value('diction'); ?>" id="diction">
    <label for="diction">Артикуляция и дикция</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="vocal_cords" value="<?= set_value('vocal_cords'); ?>" id="vocal_cords">
    <label for="vocal_cords">Голосовые связки</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="teeth" value="<?= set_value('teeth'); ?>" id="teeth">
    <label for="teeth">Зубы</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="lips" value="<?= set_value('lips'); ?>" id="lips">
    <label for="lips">Губы</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="tongue" value="<?= set_value('tongue'); ?>" id="tongue">
    <label for="tongue">Язык</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="movement" value="<?= set_value('movement'); ?>" id="movement">
    <label for="movement">Движения</label>
</div>

<div class="input-field">
    <i class="material-icons prefix">person</i>
    <input type="text" name="bite" value="<?= set_value('bite'); ?>" id="bite">
    <label for="bite">Прикус</label>
</div>
     <div class="center-align">
            <button type="submit" class="btn-custom btn waves-effect waves-light">Добавить</button>
        </div>
</form>