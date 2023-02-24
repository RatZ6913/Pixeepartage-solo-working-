<?php
if (!session_id()) {
  session_start();
}

// require_once __DIR__ . './../models/class/picture.class.php';
require_once __DIR__ . './../models/autoload.php';


if (isset($_GET['action']) !== 'editProfil' && $_SERVER['PHP_SELF'] === '/index.php' && (!empty($_SESSION['pseudo']))) {
  require_once __DIR__ . './../view/postView.php';
}

function uploadPost()
{
  $errors = ['title' => ''];

  if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $input = filter_input_array(INPUT_POST, [
      'title' => FILTER_SANITIZE_SPECIAL_CHARS,
      'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $title = $input['title'] ?? '';
    $description = $input['description'] ?? '';

    if (empty($title)) {
      $errors['title'] = 'Erreur de champ';
    }

    if (empty($description)) {
      $errors['description'] = 'Erreur de champ';
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      $picture = new Picture();
      // $picture->uploadImage();
      
      // $addPicture = [
      //   'id_user' => $_SESSION['id'] ?? '',
      //   'name' => $_FILES['image']?? '',
      //   // 'path' => $picture
      // ];

      // $picture->uploadImage();

      var_dump($_FILES);

      unset($_SESSION['status']);
      // header('location: ./#post');
    } else {
      $_SESSION['status'] = 'Erreur de soumission';
      // header('location: ./#post');
    }
  }
  var_dump($_FILES);
  require_once __DIR__ . '../../view/postView.php';

}

// var_dump($_POST);
var_dump($_FILES);