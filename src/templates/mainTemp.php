<?php

require_once __DIR__ . './../../src/view/includes/head.php';
?>

<body>
  <?php require_once __DIR__ . './../../src/view/includes/header.php'; ?>

  <!-- // View Register || Login -->
  <?= $content ?? '' ?>

  <?php require_once __DIR__ . './../../src/view/includes/footer.php'; ?>
  
</body>

</html>