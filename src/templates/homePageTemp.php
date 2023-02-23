<?php

$title = 'Page d\'accueil';
require_once __DIR__ . './../../src/view/includes/head.php';
?>
<link rel="stylesheet" href="./public/css/style.css">

<body>
  <?php require_once __DIR__ . './../../src/view/includes/header.php'; ?>
  <?= $float ?? '' ?>
  <?= $post ?? '' ?>
  <?= $content ?? '' ?>
  <?php require_once __DIR__ . './../../src/view/includes/footer.php'; ?>
</body>

</html>