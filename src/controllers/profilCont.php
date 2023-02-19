<?php

require_once __DIR__ . './../models/autoload.php';

// Si USER n'est pas connecté alors, je lui empêche : La Vue Profil (Modification)
if (empty($_SESSION['pseudo'])) {
  header('location: ./');
}

const ERROR_INPUT = "Ce champ est incorrect";
const ERROR_INVALID_MAIL = "Mail non valide";

function getViewProfil()
{

  $patternLetterNumbers = '/^[a-zA-Z0-9]+$/'; // Pattern : qui accepte seulement lettres et chiffres
  $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  // Pattern : 1 Majuscule , 8 caractères minimum, et un chiffre minimum

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
    $avatar = $_POST['avatar'] ?? '';

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

      $updateProfil = [
        'id' => $_SESSION['id'] ?? '',
        'pseudo' => $pseudo,
        'mail' => $mail,
        'password' => $password,
        'avatar' => $_FILES['avatar']['name']
      ];
      
      $_SESSION = [
        'pseudo' => $pseudo,
        'mail' => $mail,
        'avatar' => $_FILES['avatar']['name']
      ];

      $user->editUserProfil($updateProfil);
    }
  }
  require_once __DIR__ . './../view/profilView.php';
}

