<?php
require_once('./src/models/class/database.class.php');

class User extends Database
{

  public function __construct()
  {
    parent::__construct();
  }

  public function checkIfUserExist(string $pseudo, string $mail)
  {
    $checkIfUserExist = $this->pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo OR mail = :mail");
    $checkIfUserExist->bindParam('pseudo', $pseudo);
    $checkIfUserExist->bindParam('mail', $mail);
    $checkIfUserExist->execute();
    return $checkIfExist = $checkIfUserExist->fetch();
  }

  public function userRegistered(array $user)
  {
    $userRegistered = $this->pdo->prepare("INSERT INTO users (pseudo, mail, password) VALUES (:pseudo, :mail, :password)");
    return $userRegistered->execute($user);
  }

  public function checkIfMatchUser(string $pseudo) {
    $checkIfMatchUser = $this->pdo->prepare("SELECT password FROM users WHERE pseudo = :pseudo");
    $checkIfMatchUser->BindParam(':pseudo', $pseudo);
    $checkIfMatchUser->execute();
    return $checkIfMatch = $checkIfMatchUser->fetch();
  }

  function getInfoUser(string $pseudo){
    $getInfoUser = $this->pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $getInfoUser->BindParam(":pseudo", $pseudo);
    $getInfoUser->execute();
    return $getInfoUser = $getInfoUser->fetch();
  }

  function editUserProfil(array $updateProfil){
    $editUserProfil = $this->pdo->prepare("UPDATE users SET pseudo = :pseudo, mail = :mail, password = :password, avatar = :avatar WHERE id = :id");
    $editUserProfil->execute($updateProfil);
    return $updateUserProfil = $editUserProfil->fetch();
  }
}

