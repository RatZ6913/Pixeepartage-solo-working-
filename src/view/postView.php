<?php

ob_start();
?>

<div id="formConnect">
  <h1>Poster une photo ou vidéo </h1>

  <form id="form" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    <p>Titre du Post :</p>
    <input class="input" type="text" name="title">
    <p>Description du post :</p>
    <input class="input" type="text" name="description">
    <p>Uploader une Photo ou Vidéo</p>
    <input class="input" type="file" name="password">
    <input class="button" type="submit" value="Poster">
  </form>

<?=  $content = ob_get_clean();

