<h3 class="center-align"><?php echo lang('edit_group_heading');?></h3>
<p class="center-align"><?php echo lang('edit_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>
      </p>

      <p class="center-align">
          <input class="btn" type="submit" name="submit" value="Сохранить группу">
      </p>

<?php echo form_close();?>