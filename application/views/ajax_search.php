<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="collection">
    <?php foreach($children as $child): ?>
        <li class="collection-item">
            <a class="photo-thumb" href="/<?= $controller; ?>/edit/<?= $child->id; ?>">
                <img src="<?php if ($child->children_photo) echo '/uploads/40x40/' . $child->children_photo; else echo '/img/profile.png'; ?>" alt="" class="circle">
                <span><?= $child->full_name; ?></span>
            </a>
        </li>
    <?php endforeach;?>
</ul>