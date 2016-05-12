<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Инд. карта развития</title>
</head>
<body>
<a href="/speech_card/create/">Add</a><br>
<?php foreach($cards as $card): ?>
    <a href="/speech_card/edit/<?= $card->id; ?>"><?= $card->full_name; ?></a> |
    <a href="/individual_plan/delete/<?= $card->id; ?>">Delete</a><br>
<?php endforeach; ?>
</body>
</html>
