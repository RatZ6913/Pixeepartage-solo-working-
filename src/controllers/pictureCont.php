<?php
if (!session_id()) {
  session_start();
}

require_once __DIR__ . './../models/class/picture.class.php';

if (isset($_GET['action']) !== 'editProfil' && $_SERVER['PHP_SELF'] === '/index.php' && (!empty($_SESSION['pseudo']))) {
  require_once __DIR__ . './../view/postView.php';
}

function uploadPicture()
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
      unset($_SESSION['status']);
      header('location: ./index.php');
    } else {
      $_SESSION['status'] = 'Erreur de soumission';
      header('location: ./index.php');
    }
  }
}
