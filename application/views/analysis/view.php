<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a class="btn-add btn-floating waves-effect waves-light" href="/analysis/create/"><i class="material-icons">add</i></a>
<h3 class="center-align"><?= $child->full_name; ?></h3>
<table>
    <?php foreach ($analysis as $item): ?>
        <tr>
            <td class="border-td"><i class="material-icons tools">date_range</i><?= $item->date; ?></td>
            <td><?= $item->description; ?></td>
            <td><a href="/analysis/edit/<?= $item->id; ?>"><i class="material-icons tools">edit</i></a></td>
            <td><a href="/analysis/delete/<?= $item->children_id . '/' . $item->id; ?>"><i class="material-icons tools">close</i></a></td>
        </tr>
    <?php endforeach; ?>
</table>