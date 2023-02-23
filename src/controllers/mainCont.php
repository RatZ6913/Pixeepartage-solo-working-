<?php

function getViewHomePage()
{
  if (isset($_GET['action']) !== 'editProfil' && $_SERVER['PHP_SELF'] === '/index.php' && (!empty($_SESSION['pseudo']))) {
    require_once __DIR__ . './../view/postView.php';
  }
  if ($_SERVER['PHP_SELF'] == '/index.php' && empty($_GET)) {
    require_once __DIR__ . './../view/floatView.php';
    require_once __DIR__ . './../templates/homePageTemp.php';
  } else 
  getViewErrorPage();
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
