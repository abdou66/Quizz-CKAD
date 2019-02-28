<?php
    session_start();
    include '../includes/connexion_base.php';
    //déconnexion
    if(isset($_POST['logout'])) {
        unset($_SESSION["pseudo"]);
        unset($_SESSION["nom"]);
        unset($_SESSION["idC"]);
        header('Location:../index.html');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="shortcut icon" href="../images/logo_sq.png"/>
    <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/animate.css"/>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body class="container">
      <div class="row">
       <span class="col-md-12 titre"><span class="sq">SuperQuizz</span></span>
       </div>
       <div class="row interface">
           <div class="col-md-3  menu">
               <a href="accueil.php" class="col-md-12 btn btn-success actif"><i class="glyphicon glyphicon-home "></i> Accueil</a>
               <a href="sessions.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-tasks"></i> Sessions</a>
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger deco col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <p class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></p>
               <h2 class="col-md-12 box mb-5">Bonjour <?php echo $_SESSION["nom"];?></h2>
               
               <p class="sq text-center"><u>Voici les Règles générales d'utilisation</u></p>
               <ul class="text-center box regle">
                   <li class="mb-2">Dans la rubrique "Sessions", tu peux voir l'ensemble des sessions <br>
                   <img src="../images/sess.png"/>
                   </li>
                   <li class="mb-2">Un mot de passe te sera fourni pour débloquer une session</li>
                   <li class="mb-2">Une seule partie est permise par session</li>
                   <li class="mb-2">Une session déjà faite est marquée par <i class="glyphicon glyphicon-ok-sign"></i><br>
                   <img width="500" src="../images/fait.png"/>
                   </li>
                   <li>sinon <i class="glyphicon glyphicon-remove-sign"></i><br>
                   <img width="500" src="../images/nonfait.png"/>
                   </li> 
                   <li class="mb-2">Les résultats sont disponibles pour chaque session</li>
                   
               </ul>
           </div>
       </div>
        
        
        <footer class="text-center row footer2">
            <span class=" col-md-12 ">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>