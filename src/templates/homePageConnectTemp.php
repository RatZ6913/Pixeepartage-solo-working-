<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible"
      content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="./../../public/css/styles.css" />
    <script src="index.js" defer></script>
    <title>pixeepartage</title>
  </head>
  <body>

    <header id="header">
      <div id="nav">
        <div id="align" class="element-nav">
          <img src="image/cinema-2-removebg-preview.png" alt="logo github" />
          <h1>pixeepartage</h1>
        </div>
        <ul class="element-nav">
          <li>accueil</li>
          <li>photos</li>
          <li>vidéos</li>
        </ul>
        <div class="element-nav" id="button">

          <p><?= $_SESSION['avatar']."bonjour ".$_SESSION["pseudo"] ?></p>
        </div>
      </div>
    </header>

    <section>
      <figure>
        <img src="image/landscape.png" alt="landscape" />
      </figure>
      <div id="introduction">
        <h2>le partage en toute libertée</h2>
        <p id="welcome">bienvenue sur pixopartage,</p>
        <p id="join">
          venez partager vos photos et vidéos <br />sur notre réseaux social
          innovant !
        </p>
        <button class="button">Les photos </button>
        <button class="button">Les vidéos</button>
      </div>
    </section>

    <div id="formConnect">
        <h1>Poster une photo ou vidéo </h1>
        
        <form id="form" action="">
            <p>Titre du Post :</p>
            <input class="input" type="text" name="title">
            
            <p>Description du post :</p>
            <input class="input" type="text" name="desc">
            
            <p>Uploader une Photo ou Vidéo</p>
            <input  class="input" type="file" name="password">
            
            
            
            <input class="button" type="submit" value="Poster">
            
        </form>
    <div>
    <?= $content ?>
    <footer>
      <img src="image/icons8-twitter-50.png" alt="logo twitter" />
      <img src="image/icons8-google-play-48.png" alt="logo googleplay" />
      <img src="image/icons8-mac-os-50.png" alt="logo apple" />
      <img src="image/icons8-github-50.png" alt="logo github" />

      <p>&copy; pixoPartage 2023</p>
    </footer>
  </body>
</html>