<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a class="btn-add btn-floating waves-effect waves-light" href="/individual_plan/create/"><i class="material-icons">add</i></a>
<div class="col s6">
    <ul class="collection">
    <?php foreach($plans as $plan): ?>
    	<li class="collection-item">
        <a href="/individual_plan/edit/<?= $plan->id; ?>"><?= $plan->full_name; ?></a>
        <a href="/individual_plan/delete/<?= $plan->id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>