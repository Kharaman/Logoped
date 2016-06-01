<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <h3 class="center-align">Список детей</h3>
<form class="right" action="/children/search">
    <div class="input-field">
        <input type="search" name="q" id="search">
        <label for="search">Search</label>
        <i class="material-icons right">close</i>
    </div>
    <div id="search-result"></div>
</form>
    <a class="btn-add btn-floating waves-effect waves-light" href="/children/create/"><i class="material-icons">add</i></a>
    <table class="highlight">
        <tr class="border-row">
            <th></th>
            <th>Ф.И.О.</th>
            <th>Дата рождения</th>
            <th>Адресс</th>
            <th>Дата обследования ПМПК</th>
            <th>№ протокола</th>
            <th>№ группы</th>
            <td colspan="2"></td>
        </tr>
        <?php foreach ($children as $child): ?>
            <tr>
                <td class="photo-cell">
                    <img src="<?php if ($child->photo) echo '/uploads/40x40/' . $child->photo; else echo '/img/profile.png'; ?>" alt="" class="circle">
                </td>
                <td class="align-left"><?= $child->full_name; ?></td>
                <td><?= $child->date; ?></td>
                <td><?= $child->address; ?></td>
                <td><?= $child->date_PMPC; ?></td>
                <td><?= $child->protocol_number; ?></td>
                <td><?= $child->group_number . ' ' . $child->group_name; ?></td>
                <td><a href="/children/edit/<?= $child->id; ?>"><i class="material-icons tools">edit</i></a></td>
                <td><a href="/children/delete/<?= $child->id; ?>"><i class="material-icons tools">clear</i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<a href="/children/report" class="btn">Отчет</a>

