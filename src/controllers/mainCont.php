<?php

function getViewHomePage()
{
  require_once __DIR__ . './../templates/homePageTemp.php';
}

function btnLoginRegister()
{
  if (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) {
    echo "<li><a href=\"./?action=login\" class=\"button\">Se connecter</a></li>";
    echo "<li><a href=\"./?action=register\" class=\"button\">S'inscrire</a></li>";
  }
}

function getViewDisconnect(){
    require_once __DIR__ . './../view/disconnectView.php';
}

function profilUser(){
  if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    echo '<li><img src="" alt=""></li>';
    echo '</li><a href="./?action=editProfil">'. $_SESSION['pseudo'] .'</a></li>';
    echo '</li><a href="./?action=disconnect">Se déconnecter</a></li>';
  } else {
    btnLoginRegister();
  }
}

function getViewPublication()
{
  if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    require_once __DIR__ . './../view/publicationView.php';
  }
}

