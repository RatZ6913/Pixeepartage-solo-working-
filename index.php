<?php 
session_start();
var_dump($_SESSION);


require_once __DIR__ . './src/controllers/mainControllers.php';


if (!empty($_GET) && isset($_GET)) {
    if (!empty($_GET['action'] === 'login')){
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();
    } else if ( !empty($_GET['action'] === 'register')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    }
} else {
  getViewHomePage();
}
