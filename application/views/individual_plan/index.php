<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a class="btn-add btn-floating waves-effect waves-light" href="/individual_plan/create/"><i class="material-icons">add</i></a>
<div class="col s12">
    <ul class="collection">
    <?php foreach($plans as $plan): ?>
    	<li class="collection-item">
        <a class="photo-thumb" href="/individual_plan/edit/<?= $plan->id; ?>">
            <img src="<?php if ($plan->children_photo) echo '/uploads/40x40/' . $plan->children_photo; else echo '/img/profile.png'; ?>" alt="" class="circle">
            <span><?= $plan->full_name; ?></span>
        </a>
        <a href="/individual_plan/delete/<?= $plan->id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>