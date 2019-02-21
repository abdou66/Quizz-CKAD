<?php
    session_start();
    include 'includes/connexion_base.php';
    include 'includes/preparation_partie.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Présentation</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/animate.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      <div class="row " >
       <span class="col-md-12 bienvenue"><span class="sq"><div class="animated bounce">SuperQuizz</div></span></span>
       </div>
       
       <div class="row justify-content-center">
          <h4 class="col-md-12 text-center petittitre animated zoomIn"><u>Règles du jeu</u></h4>
           <ul class="col-md-12 text-center regles">
           <div class="animated zoomIn">
               <li>Vous disposez de 10 questions.</li>
               <li>Chaque question est timeboxée.</li>
               <li>Moins vous utiliserez de temps, plus vos points seront importants.</li>
               <li>Si le compteur tombe à 0, la question est invalidée et on passe à la suivante.</li>
               <li>Les questions valent des points variables.</li>
               <li>Vous disposez de 12 secondes pour répondre à chacune des questions.</li>
               </div>
           </ul>
        </div><br/>
        
        <div class="row">
        <form class="text-center"  method="POST">
          <div class="input-group">
            <div class="input-group-prepend animated slideInUp" style="animation-delay:1s">
                <div class="input-group-text"><i class="glyphicon glyphicon-user"></i></div>
            </div>
          <input type="text" name="nom"  class="form-control animated slideInUp" id="nom" placeholder="Entrez votre nom" required style="animation-delay:1s">
          </div>
           <div class="bout animated slideInUp" style="animation-delay:1s">
               <button class="btn btn-primary butlancer" name="lancer"><span class="glyphicon glyphicon-play-circle iconlancer"></span>Lancer le quizz</button>
           </div>
        </form>
        </div>

        <footer class="row">
            <span class="col-md-12 text-center">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>