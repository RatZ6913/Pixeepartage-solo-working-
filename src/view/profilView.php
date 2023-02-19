<?php

ob_start();
$title = 'Profil';

?>
<link rel="stylesheet" href="./public/css/form.style.css" />

<div id="formProfil">
  <h1>Votre profil</h1>
  <p class="para">Saisissez vos modifications</p>
  <img src="./public/images/import/logo.png" alt="">

  <form id="form" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">  
  <div>
    <label for="avatar">Avatar :</label>
    <input type="file" name="avatar" id="avatar" value="<?= $_SESSION['avatar'] ?? ''; ?>">
  </div>

  <div>
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo']; ?>">
    <p class="errors"><?= $errors['pseudo'] ?? '' ?></p>
  </div>
  <div>
    <label for="mail">Mail :</label>
    <input type="mail" name="mail" id="mail" value="<?= $_SESSION['mail']; ?>">
    <p class="errors"><?= $errors['mail'] ?? '' ?></p>
  </div>
  <div>
    <label for="password">Mot de passe :</label>
    <input type="text" name="password" id="password" value="">
    <p class="errors"><?= $errors['password'] ?? '' ?></p>
  </div>
  <div>
    <input type="submit" value="Modifier">
  </div>
  </form>

  <?php
  $content = ob_get_clean();
  require_once __DIR__ . './../templates/mainTemp.php';

