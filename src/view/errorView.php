<?php

ob_start();

?>
<link rel="stylesheet" href="/public/css/style.css" />

<body>
<a href="/">Retourner à l'accueil</a>
<div id="errorPage">
  <p>Désolé, votre page est indisponible !</p>
</div>
</body>


<?= $content = ob_get_clean();