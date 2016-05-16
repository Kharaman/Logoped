<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<a class="btn-add btn-floating waves-effect waves-light" href="/speech_card/create/"><i class="material-icons">add</i></a>
<div class="col s6">
    <ul class="collection">
    <?php foreach($cards as $card): ?>
    	<li class="collection-item">
        <a href="/speech_card/edit/<?= $card->id; ?>"><?= $card->full_name; ?></a>
        <a href="/speech_card/delete/<?= $card->id; ?>" class="delete-link right"><i class="material-icons tools">close</i></a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>