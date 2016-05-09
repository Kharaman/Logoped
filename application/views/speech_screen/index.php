<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список детей</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Речевой экран</h1>
<a href="/speech_screen/create/">Add</a>
<table>
    <tr>
        <td>Ф.И.О.</td>
        <td>ФФ. восприятие</td>
        <td>Год обучения</td>
        <td>Диагноз</td>
        <?php foreach ($sounds as $sound): ?>
            <td><?= $sound->name; ?></td>
        <?php endforeach; ?>
    </tr>
    <?php foreach($screens as $screen): ?>
        <tr>
            <td><?= $screen['full_name']; ?></td>
            <td><?= $screen['ff_perception']; ?></td>
            <td><?= $screen['study_year']; ?></td>
            <td><?= $screen['diagnosis']; ?></td>
            <?php foreach($screen['sounds'] as $sound): ?>
                <td><?= $sound['progress_symbol']; ?></td>
            <?php endforeach; ?>
            <td><a href="/speech_screen/edit/<?= $screen['id']; ?>">Edit</a></td>
            <td><a href="/speech_screen/delete/<?= $screen['id']; ?>">X</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
