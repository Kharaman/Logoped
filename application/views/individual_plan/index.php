<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Инд. план развития</title>
</head>
<body>
<a href="/individual_plan/create/">Add</a><br>
    <?php foreach($plans as $plan): ?>
        <a href="/individual_plan/edit/<?= $plan->id; ?>"><?= $plan->full_name; ?></a> |
        <a href="/individual_plan/delete/<?= $plan->id; ?>">Delete</a><br>
    <?php endforeach; ?>
</body>
</html>
