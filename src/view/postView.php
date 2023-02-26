<?php
ob_start();
?>
<link rel="stylesheet" href="./public/css/form.style.css" />
<link rel="stylesheet" href="./public/css/style.css" />

<div id="formConnect">
  <h1>Poster une photo ou vidéo</h1>

  <form id="post" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" enctype='multipart/form-data'>
    <p>Titre du Post :</p>
    <input class="input" type="text" name="title">
    <p>Description du post :</p>
    <input class="input" type="text" name="description">
    <p>Uploader une Photo ou Vidéo</p>
    <input class="input" type="file" name="post">
    <input class="button" type="submit" value="Poster">
    <p class="errors"><?= $_SESSION['status'] ?? '' ?></p>
  </form>
</div>

<?php
$post = ob_get_clean();