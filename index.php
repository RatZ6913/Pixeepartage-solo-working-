<?php 
session_start();




require_once __DIR__ . './src/controllers/homePageCont.php';



if (!empty($_GET) && isset($_GET)) {
    if (!empty($_GET['action'] === 'login')){
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();
    } else if ( !empty($_GET['action'] === 'register')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    }
    // } else if ( $_GET['action'] == 'askRegister'){
    //     verifInscription ();
    
    // }
//   if (!empty($_GET['action'] === 'register')) {
//     registerView();
//     // if($_POST){
//       // var_dump($_POST);
//       // var_dump($errors);
//     // }
//   } else if (!empty($_GET['action'] === 'login')){
//     loginView();
//   } else if(!empty($_GET['action'] === 'pictures')){
//     picturesView();
//   } else if ($_GET['action'] === 'videos'){
//     videosView();
//   }


} else {
  getViewHomePage();
}

