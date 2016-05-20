<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a class="btn-add btn-floating waves-effect waves-light" href="/analysis/create/"><i class="material-icons">add</i></a>
<div class="col s8 offset-s2">
    <ul class="collection">
    <?php foreach($children as $child): ?>
    	<li class="collection-item">
        <a href="/analysis/view/<?= $child->id; ?>"><?= $child->full_name; ?></a>
        <a href="/analysis/delete_all/<?= $child->id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>