<?php

function getViewHomePage()
{
  require_once __DIR__ . './../templates/homePageTemp.php';
}

function getViewPublication()
{
  if (!empty($_SESSION['pseudo'])) {
    require_once __DIR__ . './../view/postView.php';
  }
}

function getViewDisconnect()
{
  // Si aucune session USER alors je lui empêche : La Vue Déconnexion
  if (empty($_SESSION['pseudo'])) {
    header('location: ./');
  }
  require_once __DIR__ . './../view/disconnectView.php';
}

function getViewErrorPage()
{
  require_once __DIR__ . './../view/errorView.php';
  die();
}

function getviewFloat()
{
  if ($_GET['action'] !== './') {
    require_once __DIR__ . './../view/includes/float.php.php';
  }
}
