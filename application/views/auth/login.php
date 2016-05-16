<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="body-auth">
<div class="login-block">
<div class="login-block__img-wrapper">
  <img src="/img/auth-img.jpg" alt="Logoped">
</div>
<h1 class="login-block__main-title">Logoped</h1>
<!-- <p><?php echo lang('login_subheading');?></p>
 -->
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <div class="input-field">
    <i class="material-icons prefix">persons</i>
    <?php echo form_input($identity);?>
    <label for="identity">Логин</label>
  </div>

  <div class="input-field">
    <i class="material-icons prefix">vpn_key</i>
    <?php echo form_input($password);?>        
    <label for="password">Пароль</label>
  </div>


<div class="switch">
    <label>
      Запомнить меня?
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      <span class="lever"></span>
      
    </label>
</div>


  <button class="btn btn-auth waves-effect waves-light" type="submit" name="action">
    Sign In
  </button>

<?php echo form_close();?>

<p class="login-block__forgot-link">
<a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>