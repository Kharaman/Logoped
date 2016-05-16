<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3 class="center-align">Речевой экран</h3>
<form class="right" action="/speech_screen/search">
    <div class="input-field">
        <input type="search" name="q" id="search">
        <label for="search">Search</label>
        <i class="material-icons right">close</i>
    </div>
</form>
<a class="btn-add btn-floating waves-effect waves-light" href="/speech_screen/create/"><i class="material-icons">add</i></a><table>
    <tr class="border-row">
        <td>Ф.И.О.</td>
        <td>ФФ. восприятие</td>
        <td>Год обучения</td>
        <td>Диагноз</td>
        <?php foreach ($sounds as $sound): ?>
            <td><?= $sound->name; ?></td>
        <?php endforeach; ?>
        <td colspan="2"></td>
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
            <td><a href="/speech_screen/edit/<?= $screen['id']; ?>"><i class="material-icons tools">edit</i></a></td>
            <td><a href="/speech_screen/delete/<?= $screen['id']; ?>"><i class="material-icons tools">clear</i></a></td>
        </tr>
    <?php endforeach; ?>
</table>