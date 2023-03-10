<?php
if(!session_id()){
  session_start();
}
require_once __DIR__ . './../models/autoload.php';

// Si USER n'est pas connecté alors, je lui empêche : La Vue Profil (Modification)
if(empty($_SESSION['pseudo'])){
  header('location: ./');
}

const ERROR_INPUT = "Ce champ est incorrect";
const ERROR_INVALID_MAIL = "Mail non valide";

function getViewProfil(){
  unset($_SESSION['status']);

  $patternLetterNumbers = '/^[a-zA-Z0-9]+$/'; // Pattern : qui accepte seulement lettres et chiffres
  $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  // Pattern : 1 Majuscule , 8 caractères minimum, et un chiffre minimum

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [
      'pseudo' => '',
      'mail' => '',
      'password' => ''
    ];

    $input = filter_input_array(INPUT_POST, [
      'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
      'mail' => FILTER_SANITIZE_EMAIL,
      'password' => FILTER_SANITIZE_SPECIAL_CHARS
    ]);

    $pseudo = $input['pseudo'] ?? '';
    $mail = $input['mail'] ?? '';
    $password = $input['password'] ?? '';

    if (empty($pseudo)) {
      $errors['pseudo'] = ERROR_INPUT;
    } else if (!preg_match($patternLetterNumbers, $pseudo)) {
      $errors['pseudo'] = "Caractères invalide";
    }

    if (empty($mail)) {
      $errors['mail'] = ERROR_INPUT;
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errors['mail'] = ERROR_INVALID_MAIL;
    }

    if (empty($password)) {
      $errors['password'] = ERROR_INPUT;
    } else if (!preg_match($patternPassword, $password)) {
      $errors['password'] = "Une Majuscule, un chiffre, 8 caractères";
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      $password = password_hash($password, PASSWORD_BCRYPT);

      $user = new User();
      $picture = new Picture();
      $picture->uploadImage();

      $mimeType = explode('/', $_FILES['post']['type'])[1];
      if($mimeType == 'jpeg'){
        $mimeType = str_replace("e", "", $mimeType);
      }

      $updateProfil = [
        'id' => $_SESSION['id_user'],
        'pseudo' => $pseudo,
        'mail' => $mail,
        'password' => $password,
        'avatar' => substr(md5($_FILES['post']['name']), 0, 8) . '.' . $mimeType
      ];

      $user->editUserProfil($updateProfil);
      
      $_SESSION = [
        'id_user' => $user->getInfoUser($pseudo)['id'],
        'pseudo' => $pseudo,
        'mail' => $mail,
        'avatar' => substr(md5($_FILES['post']['name']), 0, 8) . '.' . $mimeType
      ];

      $_SESSION['status'] = 'Modification réussi';
      header('location: ./?action=editProfil');
    }
  }
  require_once __DIR__ . './../view/profilView.php';
	require_once __DIR__ . './../templates/homePageTemp.php';
}
