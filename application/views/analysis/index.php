<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анализ резльтатаивности</title>
</head>
<body>
<a href="/analysis/create/">Add</a><br>
<?php foreach($children as $child): ?>
    <a href="/analysis/view/<?= $child->id; ?>"><?= $child->full_name; ?></a> | <a href="/analysis/delete_all/<?= $child->id; ?>">X</a><br>
<?php endforeach; ?>
</body>
</html>
