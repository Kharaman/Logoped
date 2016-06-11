<?php defined('BASEPATH') OR exit('No direct script access allowed');
$account = $this->ion_auth->user()->row();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div id="wrapper" class="minimized">
    <aside id="side-wrapper">
      <ul class="sidebar-list">
        <li></li>
        <li><a class="waves-effect waves-light" href="/home"><i class="material-icons">home</i><span>Главная</span></a></li>
        <li><a class="waves-effect waves-light" href="/children"><i class="material-icons">account_box</i><span>Список детей</span></a></li>
        <li><a class="waves-effect waves-light" href="/speech_screen"><i class="material-icons">chat</i><span>Речевой экран</span></a></li>
        <li><a class="waves-effect waves-light" href="/individual_plan"><i class="material-icons">folder_shared</i><span>Планы</span></a></li>
        <li><a class="waves-effect waves-light" href="/speech_card"><i class="material-icons">school</i><span>Речевое развитие</span></a></li>
        <li><a class="waves-effect waves-light" href="/analysis"><i class="material-icons">poll</i><span>Результативность</span></a></li>
        <li><a class="waves-effect waves-light" href="/individual_card"><i class="material-icons">content_paste</i><span>Карта развития</span></a></li>
      </ul>
      <button type="button" data-toggle="sidebar" class="btn-canvas"><i class="material-icons">close</i></button>
    </aside>
    <div class="content-wrapper">
      <div class="top-bar-wrapper">
      <nav class="top-bar">
        <ul class="left trigger">
          <li><button type="button" data-toggle="sidebar" class="btn-canvas"><i class="material-icons">reorder</i></button></li>
        </ul>
        <ul class="right">
          <li><a href="/children_groups"><i class="material-icons">people</i>Группы</a></li>
          <li><a href="/work_schedule"><i class="material-icons">access_time</i>График работы</a></li>
          <li><a href="/classes_schedule"><i class="material-icons">event_note</i>Расписание занятий</a></li>
          <li><a href="#modal-exit" class="modal-trigger"><i class="material-icons tools">account_circle</i><?= $account->username; ?><i class="material-icons tiny">exit_to_app</i></a></li>
        </ul>
      </nav>
      </div>
      <div class="container">
        <main class="row content">