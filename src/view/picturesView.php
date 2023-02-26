<?php
ob_start();
$title = 'Photos';
?>

<link rel="stylesheet" href="./public/css/style.css" />

<section>
  <h1>Liste des photos</h1>
  <div>
    <h2>Voici les photos</h2>
    <?php foreach ($arrPictures as $showPicture) { ?>
      <div class="box-pictures">
        <img src="<?= $showPicture['path'] . $showPicture['name']; ?>" alt="" class="content-pictures">
        <?php
        if (!empty($_SESSION['pseudo']) !== '') : ?>
          <p><?= $_SESSION['pseudo'] ?? ''; ?></p>
        <?php endif; ?>
      </div>
    <?php } ?>
  </div>
</section>

<?php
$content = ob_get_clean();
