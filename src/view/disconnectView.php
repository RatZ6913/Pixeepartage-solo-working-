<?php
ob_start();
$title = 'Déconnexion';
require_once __DIR__ . './../../src/view/includes/head.php';

?>
<body>
  
<div>
  <p>Vous avez bien été déconnecter</p>
  <p>Merci de votre visite</p>
  <a href="./">Page d'accueil</a>
</div>
</body>

<?= $content = ob_get_clean();

session_destroy();