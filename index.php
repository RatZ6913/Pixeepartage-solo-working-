<?php
if (!session_id()) {
  session_start();
}

require_once __DIR__ . './src/models/autoload.php';
require_once __DIR__ . './src/controllers/mainCont.php';

try {

  if (!empty($_GET) && isset($_GET)) {
    $_GET['action'] = $_GET['action'] ?? '';

    if (!empty($_GET['action'] === 'login')) {
      require_once __DIR__ . './src/controllers/loginCont.php';
      getViewLogin();
    } else if (!empty($_GET['action'] === 'register')) {
      require_once __DIR__ . './src/controllers/registerCont.php';
      getViewRegister();
    } else if (!empty($_GET['action'] === 'disconnect')) {
      getViewDisconnect();
    } else if (!empty($_GET['action'] === 'editProfil')) {
      require_once __DIR__ . './src/controllers/profilCont.php';
      getViewProfil();
    } else {
      throw new Exception(getViewErrorPage());
    }
  } else {
    getViewHomePage();
  }
} catch (Exception $e) {
  throw new Exception($e->getMessage(getViewErrorPage()));
}

