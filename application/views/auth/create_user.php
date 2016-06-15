<h3 class="center-align"><?php echo lang('create_user_heading');?></h3>
<p class="center-align"><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <?php
      /*if($identity_column!=='email') {
            echo '<p>';
            echo lang('create_user_identity_label', 'identity');
            echo '<br />';
            echo form_error('identity');
            echo form_input($identity);
            echo '</p>';
      }*/
      ?>
      <div class="input-field">
            <i class="material-icons prefix">account_box</i>
            <input type="text" name="identity" value="<?= set_value('identity'); ?>" id="identity">
            <label for="identity">Логин</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">person</i>
            <input type="text" name="first_name" value="<?= set_value('first_name'); ?>" id="first_name">
            <label for="first_name">Имя</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">person_outline</i>
            <input type="text" name="last_name" value="<?= set_value('last_name'); ?>" id="last_name">
            <label for="last_name">Фамилия</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">business</i>
            <input type="text" name="company" value="<?= set_value('company'); ?>" id="company">
            <label for="company">Место работы</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="text" name="email" value="<?= set_value('email'); ?>" id="email">
            <label for="email">Email</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">call</i>
            <input type="text" name="phone" value="<?= set_value('phone'); ?>" id="phone">
            <label for="phone">Телефон</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input type="text" name="password" value="<?= set_value('password'); ?>" id="password">
            <label for="password">Пароль</label>
      </div>

      <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input type="text" name="password_confirm" value="<?= set_value('password_confirm'); ?>" id="password_confirm">
            <label for="password_confirm">Подтвердите пароль</label>
      </div>

      <p class="center-align">
            <input class="btn" type="submit" name="submit" value="Создать пользователя">
      </p>

<?php echo form_close();?>
