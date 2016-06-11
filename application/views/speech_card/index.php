<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <h3 class="center-align">Карты речевого развития</h3>
<form class="right form-right" action="/speech_card/search">
    <div class="input-field">
        <input type="search" name="q" id="speech_card-search" autocomplete="off" autofocus>
        <label for="search">Search</label>
        <i class="material-icons right close-icon">close</i>
    </div>
    <div id="search-result"></div>
</form>
<a class="btn-add btn-floating waves-effect waves-light" href="/speech_card/create/"><i class="material-icons">add</i></a>
<div class="col s12">
    <ul class="collection">
    <?php foreach($cards as $card): ?>
    	<li class="collection-item">
        <a class="photo-thumb" href="/speech_card/edit/<?= $card->id; ?>">
            <img src="<?php if ($card->children_photo) echo '/uploads/40x40/' . $card->children_photo; else echo '/img/profile.png'; ?>" alt="" class="circle">
            <span><?= $card->full_name; ?></span>
        </a>
        <a href="/speech_card/delete/<?= $card->id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?= $pagination; ?>
</div>