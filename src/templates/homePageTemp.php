<?php

$title = 'Page d\'accueil';
require_once __DIR__ . './../../src/view/includes/head.php';
?>

<body>
  <?php require_once __DIR__ . './../../src/view/includes/nav.php'; ?>

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
  <footer>
    <img src="image/icons8-twitter-50.png" alt="logo twitter">
    <img src="image/icons8-google-play-48.png" alt="logo googleplay">
    <img src="image/icons8-mac-os-50.png" alt="logo apple">
    <img src="image/icons8-github-50.png" alt="logo github">

    <p>&copy; PixeePartage 2023</p>
  </footer>
</body>

</html>