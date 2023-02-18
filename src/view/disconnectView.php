<?php
ob_start();
$title = 'Déconnexion';
require_once __DIR__ . './../../src/view/includes/head.php';
?>

<link rel="stylesheet" href="./public/css/style.css">

<body>
  <div id="disconnect">
    <p class="text-dc">Vous avez bien été déconnecté</p>
    <p class="text-dc">Merci de votre visite</p>
    <p class="text-dc">À bientôt !</p>
    <a href="./" class="text-dc">Page d'accueil</a>
  </div>
</body>

<?= $content = ob_get_clean();

require_once __DIR__ . './../../src/view/includes/footer.php';
session_destroy();
