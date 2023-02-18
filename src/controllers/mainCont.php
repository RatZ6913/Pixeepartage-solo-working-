<?php

function getViewHomePage()
{
  require_once __DIR__ . './../templates/homePageTemp.php';
}

function getViewPublication()
{
  if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    require_once __DIR__ . './../view/postView.php';
  }
}

function getViewDisconnect(){
  require_once __DIR__ . './../view/disconnectView.php';
}

