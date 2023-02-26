<?php
if (!session_id()) {
  session_start();
}

require_once __DIR__ . './../models/class/picture.class.php';
require_once __DIR__ . './../models/class/video.class.php';

if (isset($_GET['action']) !== 'editProfil' && $_SERVER['PHP_SELF'] == '/index.php' && (!empty($_SESSION['pseudo']))) {
  require_once __DIR__ . './../view/postView.php';
}

function getViewPost()
{
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = ['errors' => ''];

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

      if (!empty($_FILES['post'])) {

        $fileType = explode('/', $_FILES['post']['type'])[0];

        if ($fileType == 'image') {
          $picture = new Picture();
          $picture->uploadImage() ?? '';

          $hashNamePicture = substr(md5($_FILES['post']['name']), 0, 8) ?? '';

          $postPicture = [
            'id_user' => $_SESSION['id'] ?? '',
            'name' => $hashNamePicture ?? '',
            'path' => $picture->targetDir
          ];
          $picture->userPostPicture($postPicture);
        }
      }

      unset($_SESSION['status']);
      // header('location: ./#post');
    } else {
      $_SESSION['status'] = 'Erreur de soumission';
      header('location: ./#post');
    }
  }
}
