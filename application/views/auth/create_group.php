<h3 class="center-align"><?php echo lang('create_group_heading');?></h3>
<p class="center-align"><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

    <div class="input-field">
        <i class="material-icons prefix">people</i>
        <input type="text" name="group_name" value="<?= set_value('group_name'); ?>" id="group_name">
        <label for="group_name" class="">Группа</label>
    </div>

    <div class="input-field">
        <i class="material-icons prefix">insert_comment</i>
        <input type="text" name="description" value="<?= set_value('description'); ?>" id="description">
        <label for="description" class="">Описание</label>
    </div>

      <p class="center-align">
          <input class="btn" type="submit" name="submit" value="Создать группу">
      </p>

<?php echo form_close();?>