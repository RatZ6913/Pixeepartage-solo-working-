<?php
ob_start();
?>
  <section>
    <figure>
      <img src="./public/images/import/landscape.png" alt="landscape">
    </figure>
    <div id="introduction">
      <h2>le partage en toute libertée</h2>
      <p id="welcome">bienvenue sur PixeePartage,</p>
      <p id="join">venez partager vos photos et vidéos <br>sur notre réseaux social innovant !</p>
    </div>
  </section>

<?php
$float = ob_get_clean();