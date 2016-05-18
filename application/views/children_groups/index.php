<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a class="btn-add btn-floating waves-effect waves-light" href="/children_groups/create/"><i class="material-icons">add</i></a><table>

<table>
    <tr class="border-row">
        <th>№ группы</th>
        <th>Имя</th>
        <th></th>
        <th></th>
    </tr>
        <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $group->id; ?></td>
                <td><?= $group->name; ?></td>
                <td><a href="/children_groups/edit/<?= $group->id; ?>"><i class="material-icons tools">edit</i></a></td>
                <td><a href="/children_groups/delete/<?= $group->id; ?>"><i class="material-icons tools">close</i></a></td>
            </tr>
        <?php endforeach; ?>
</table>
