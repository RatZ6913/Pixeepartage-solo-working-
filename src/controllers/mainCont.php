<?php

function getViewHomePage()
{
  require_once __DIR__ . './../controllers/postCont.php';
  getViewPost();

  if ($_SERVER['PHP_SELF'] == '/index.php' && empty($_GET)) {
    $title = 'Page d\'accueil';

    require_once __DIR__ . './../view/floatView.php';
    require_once __DIR__ . './../templates/homePageTemp.php';
  } else {
    getViewError();
  }
}

function getViewDisconnect()
{
  // Si aucune session USER alors je lui empêche : La Vue Déconnexion
  if (empty($_SESSION['pseudo'])) {
    header('location: ./');
  }
  require_once __DIR__ . './../view/disconnectView.php';
  require_once __DIR__ . './../templates/homePageTemp.php';
}

function getViewError()
{
  require_once __DIR__ . './../view/errorView.php';
  die();
}

function getViewPictures()
{
  $picture = new Picture();
  $arrPictures = $picture->getAllPictures();
  
  require_once __DIR__ . './../view/picturesView.php';
  require_once __DIR__ . './../templates/homePageTemp.php';
}
