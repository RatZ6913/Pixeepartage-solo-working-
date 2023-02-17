<?php
require_once('./src/models/class/database.class.php');

class User extends Database
{

  private int $id;
  private string $pseudo;
  private string $mail;
  private string $password;
  private string $avatar;

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
    $checkIfPasswordOkExist = $this->pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $checkIfPasswordOkExist->BindParam(':pseudo', $pseudo);
    $checkIfPasswordOkExist->execute();
    return $return = $checkIfPasswordOkExist->fetch();
  }

}

