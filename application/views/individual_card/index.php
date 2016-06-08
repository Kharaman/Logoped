<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3 class="center-align">Индивидуальные карты развития</h3>
<a class="btn-add btn-floating waves-effect waves-light" href="/individual_card/create/"><i class="material-icons">add</i></a>
<div class="col s8 offset-s2">
    <ul class="collection">
    <?php foreach($children as $child): ?>
    	<li class="collection-item">
            <a class="photo-thumb" href="/individual_card/view/<?= $child->children_id; ?>">
                <img src="<?php if ($child->children_photo) echo '/uploads/40x40/' . $child->children_photo; else echo '/img/profile.png'; ?>" alt="" class="circle">
                <span><?= $child->full_name; ?></span>
            </a>
            <a href="/analysis/delete_all/<?= $child->children_id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?= $pagination; ?>
</div>