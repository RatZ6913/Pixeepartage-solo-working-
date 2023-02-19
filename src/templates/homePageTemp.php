<?php

$title = 'Page d\'accueil';
require_once __DIR__ . './../../src/view/includes/head.php';
?>

<body>
   <?php require_once __DIR__ . './../../src/view/includes/header.php'; ?>
  <section>
    <figure>
      <img src="/public/images/import/landscape.png" alt="landscape">
    </figure>
    <div id="introduction">
      <h2>le partage en toute libertée</h2>
      <p id="welcome">bienvenue sur PixeePartage,</p>
      <p id="join">venez partager vos photos et vidéos <br>sur notre réseaux social innovant !</p>
    </div>
  </section>

  <section>
    <?= getViewPublication(); ?>
  </section>

  <?= $content ?? '' ?>
  <?php require_once __DIR__ . './../../src/view/includes/footer.php'; ?>
</body>

</html>
