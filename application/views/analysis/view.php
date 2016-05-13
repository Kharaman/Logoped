<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анализ результативности - <?= $child->full_name; ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<a href="/analysis/create/">Add</a><br>
<h1><?= $child->full_name; ?></h1>
<table>
    <?php foreach ($analysis as $item): ?>
        <tr>
            <td><?= $item->date; ?></td>
            <td><?= $item->description; ?></td>
            <td><a href="/analysis/edit/<?= $item->id; ?>">Edit</a></td>
            <td><a href="/analysis/delete/<?= $item->children_id . '/' . $item->id; ?>">X</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
