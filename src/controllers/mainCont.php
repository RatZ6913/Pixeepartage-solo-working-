<?php

function getViewHomePage()
{
  require_once __DIR__ . './../templates/homePageTemp.php';
}

function loginOrRegister()
{
  if (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) {
    echo $btnLogin = "<li><a href=\"./?action=login\" class=\"button\">Se connecter</a></li>";
    echo $btnregister = "<li><a href=\"./?action=register\" class=\"button\">S'inscrire</a></li>";
  }
}

function getViewPublication()
{
  if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    require_once __DIR__ . './../view/publicationView.php';
  }
}

