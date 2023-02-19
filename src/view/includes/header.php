<link rel="stylesheet" href="./public/css/style.css">

<header>
  <nav>
    <div>
      <img src="./public/images/import/logo.png" alt="logo">
      <span>PixeePartage</span>
    </div>
    <ul>
      <li><a href="./">Accueil</a> </li>
      <li><a href="./?action=pictures">Photos</a> </li>
      <li><a href="./?action=videos">Vidéos</a> </li>

      <?php if (empty($_SESSION['pseudo']) && !isset($_SESSION['pseudo'])) : ?>
        <li><a href="./?action=login" class="button">Se connecter</a></li>
        <li><a href="./?action=register" class="button">S'inscrire</a></li>
      <?php
      endif;
      if (!empty($_SESSION['pseudo']) && isset($_SESSION['pseudo'])) : ?>
        <li><img src="./public/images/uploads/<?= $_SESSION['avatar'] ?? '' ;?>" alt="Logo Profil">
          <a href="./?action=editProfil" class="button"><?= $_SESSION['pseudo'] ?? ''; ?></a>
        </li>
        <li><a href="./?action=disconnect" class="button">Se déconnecter</a></li>
      <?php
      endif;
      ?>
    </ul>
  </nav>
</header>
