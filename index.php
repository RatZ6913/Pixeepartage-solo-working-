<?php
if (!session_id()) {
  session_start();
}

require_once __DIR__ . './src/models/autoload.php';
require_once __DIR__ . './src/controllers/mainCont.php';

try {
  if (htmlspecialchars(!empty($_SERVER['PHP_SELF'] === '/index.php'))
  && empty($_GET)) {
    getViewHomePage();
    
      if (!empty($_GET['action'] === 'login')) {
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();
      } else if (!empty($_GET['action'] === 'register')) {
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
      } else if (!empty($_GET['action'] === 'disconnect')) {
        getViewDisconnect();
      }

  } else {
    getViewErrorPage();
  }
} catch (Exception $e) {
  throw new Exception($e->getMessage());
}
