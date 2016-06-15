<h3 class="center-align"><?php echo lang('edit_user_heading');?></h3>
<p class="center-align"><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <p class="input-field">
            <i class="material-icons prefix">person</i>
            <?php echo form_input($first_name);?>
            <?php echo lang('edit_user_fname_label', 'first_name');?> 
      </p>

      <p class="input-field">
            <i class="material-icons prefix">person_outline</i>
            <?php echo form_input($last_name);?>
            <?php echo lang('edit_user_lname_label', 'last_name');?> 
      </p>

      <p class="input-field">
            <i class="material-icons prefix">business</i>
            <?php echo form_input($company);?>
            <?php echo lang('edit_user_company_label', 'company');?> 
      </p>

      <p class="input-field">
            <i class="material-icons prefix">call</i>
            <?php echo form_input($phone);?>
            <?php echo lang('edit_user_phone_label', 'phone');?> 
      </p>

      <p class="input-field">
            <i class="material-icons prefix">lock</i>
            <?php echo form_input($password);?>
            <?php echo lang('edit_user_password_label', 'password');?> 
      </p>

      <p class="input-field">
            <i class="material-icons prefix">lock</i>
            <?php echo form_input($password_confirm);?>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h4 class="center-align"><?php echo lang('edit_user_groups_heading');?></h4>
          <?php foreach ($groups as $group):?>
              <p class="edit-users">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" id="<?= $group['id']; ?>" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              <label class="checkbox" for="<?= $group['id']; ?>"></label>
              </p>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p class="center-align">
        <input class="btn" type="submit" name="submit" value="Сохранить">
      </p>

<?php echo form_close();?>
