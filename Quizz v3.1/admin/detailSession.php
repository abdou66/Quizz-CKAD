<?php
    session_start();
    include '../includes/connexion_base.php';

    //déconnexion
    if(isset($_POST['logout'])) {
        unset($_SESSION["pseudo"]);
        unset($_SESSION["nom"]);
        header('Location:../index.html');
    }
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions</title>
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
               <a href="accueil.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-home "></i> Accueil</a>
               <a href="sessions.php" class="col-md-12 btn btn-success actif"><i class="glyphicon glyphicon-tasks"></i> Sessions</a>
               <a href="candidats.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-user"></i> Candidats</a>
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger deco col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <span class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></span>
               <div class="resultats">
                <h5 class="col-md-12 petittitre"><u><div class="animated slideInLeft">Libellé questionnaire</div></u></h5>
                <table  class="col-md-10 table table-hover table-bordered text-center animated zoomIn" style="animation-delay:1s" id="tableau">
                    <tr><th>#</th><th class="">Candidats</th><th>Etat</th><th>Résultats</th></tr>
                    <tr><td>1</td><td>Cheikh</td><td><i class="glyphicon glyphicon-ok-sign"></i></td><td>12/20</td></tr>
                    <tr><td>2</td><td>Abdou</td><td><i class="glyphicon glyphicon-remove-sign"></i></td><td>--/20</td></tr>
                    <tr><td colspan="2"></td><td>Moyenne</td><td class="animated zoomIn">13,5/20</td></tr>
                </table>
                </div>
           </div>
       </div>
        
        
        <footer class="text-center row footer2">
            <span class=" col-md-12 ">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>