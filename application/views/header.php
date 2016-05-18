<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav class="top-bar">
  <ul class="right">
      <li><a href="/children_groups"><i class="material-icons">access_time</i>Группы</a></li>
      <li><a href="/work_schedule"><i class="material-icons">access_time</i>График работы</a></li>
      <li><a href="/classes_schedule"><i class="material-icons">access_time</i>Расписание занятий</a></li>
  	<li><a href="/home"><i class="material-icons">home</i>Home</a></li>
    <li><a href="/auth/logout">Выйти</a></li>
  </ul>
</nav>
<div class="container">
<main class="row content">