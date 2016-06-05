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
        <li>
          <a href="/home"><i class="material-icons">home</i><span>Главная</span></a>
        </li>
      </ul>
      <button type="button" data-toggle="sidebar" class="btn-canvas"><i class="material-icons">close</i></button>
    </aside>
    <div class="content-wrapper">
      <nav class="top-bar">
        <ul class="left">
          <li><button type="button" data-toggle="sidebar" class="btn-canvas"><i class="material-icons">reorder</i></button></li>
        </ul>
        <ul class="right">
          <li><a href="/children_groups"><i class="material-icons">people</i>Группы</a></li>
          <li><a href="/work_schedule"><i class="material-icons">access_time</i>График работы</a></li>
          <li><a href="/classes_schedule"><i class="material-icons">event_note</i>Расписание занятий</a></li>
        	<li><i class="material-icons tools">account_circle</i><?= $account->username; ?></li>
          <li><a href="/auth/logout">Выйти</a></li>
        </ul>
      </nav>
      <div class="container">
        <main class="row content">