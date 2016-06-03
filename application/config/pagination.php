<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$tag_open = '<li class="waves-effect waves-light">';
$tag_close = '</li>';

$config = [
    'full_tag_open' => '<ul class="pagination">',
    'full_tag_close' => '</ul>',
    'first_link' => '<i class="material-icons">first_page</i>',
    'last_link'  => '<i class="material-icons">last_page</i>',
    'first_tag_open' => $tag_open,
    'first_tag_close' => $tag_close,
    'last_tag_open' => $tag_open,
    'last_tag_close' => $tag_close,
    'next_link' => '<i class="material-icons">chevron_right</i>',
    'next_tag_open' => $tag_open,
    'next_tag_close' => $tag_close,
    'prev_link' => '<i class="material-icons">chevron_left</i>',
    'prev_tag_open' => $tag_open,
    'prev_tag_close' => $tag_close,
    'cur_tag_open' => '<li class="active">',
    'cur_tag_close' => '</li>',
    'num_tag_open' => $tag_open,
    'num_tag_close' => $tag_close
];

