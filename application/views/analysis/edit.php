<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анализ результативности</title>
</head>
<body>
<?= validation_errors(); ?>
<form action="/analysis/edit/<?= $analysis->id; ?>" method="post">
    <input type="hidden" name="children_id" value="<?= $analysis->children_id; ?>">
    <br>
    <label for="description">Описание:</label><br>
    <textarea id="description" name="description" cols="30" rows="10"><?= set_value('description', $analysis->description);?></textarea><br>
    <input type="submit" value="ok">
</form>
</body>
</html>
