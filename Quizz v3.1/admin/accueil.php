<?php
    session_start();
    include '../includes/connexion_base.php';
    //nb de cand.
    $sql1="SELECT * FROM quizz.candidats"; //
    $req1=$bdd->query($sql1);
    //nb de sess.
    $sql2="SELECT * FROM quizz.questionnaire"; //
    $req2=$bdd->query($sql2);
    //pourcentage fait
        //total
    $sql3="SELECT AVG(fait) AS nbf FROM quizz.candsession"; 
    $req3=$bdd->query($sql3);
    $d3=$req3->fetch();
    //temps moyen
    $sql5="SELECT AVG(temps) AS tps FROM quizz.reponses"; 
    $req5=$bdd->query($sql5);
    $d5=$req5->fetch();
    //déconnexion
    if(isset($_POST['logout'])) {
        unset($_SESSION["pseudo"]);
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
               <a href="candidats.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-user"></i> Candidats</a>
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger deco col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <span class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></span><br>
               <div class="row text-center box">
                <span class="col-md-1"></span>
                 <div class="card text-white bg-primary mb-1 col-md-4">
                  <div class="card-header"><i class="glyphicon glyphicon-user"></i> Joueurs</div>
                  <div class="card-body">
                    <h6 class="card-title">Nombre</h6>
                    <p class="card-text text-white chiffre"><?php echo $req1->rowCount();?></p>
                  </div>
                </div>
                <span class="col-md-2"></span>
                <div class="cad text-white bg-secondary mb-1 col-md-4">
                  <div class="card-header"><i class="glyphicon glyphicon-list"></i> Sessions</div>
                  <div class="card-body">
                    <h6 class="card-title">Questionnaires</h6>
                    <p class="card-text text-white chiffre"><?php echo $req2->rowCount();?></p>
                  </div>
                </div>
                <span class="col-md-1"></span>
                <span class="col-md-1"></span>
                <div class="card text-white bg-success mb-1 col-md-4">
                  <div class="card-header"><i class="glyphicon glyphicon-ok-sign"></i> Parties</div>
                  <div class="card-body">
                    <h6 class="card-title">Pourcentage %</h6>
                    <p class="card-text text-white chiffre"><?php echo round($d3["nbf"]*100,1);?></p>
                  </div>
                </div>
                <span class="col-md-2"></span>
                <div class="card text-white bg-danger mb-1 col-md-4">
                  <div class="card-header"><i class="glyphicon glyphicon-hourglass"></i> Temps moyen</div>
                  <div class="card-body">
                    <h6 class="card-title">pour répondre à une question</h6>
                    <p class="card-text text-white chiffre"> <?php echo round($d5["tps"],1);?>s</p>
                  </div>
                </div>
                <span class="col-md-1"></span>
                </div>
           </div>
       </div>
        
        
        <footer class="text-center row footer2 ">
            <span class=" col-md-12 ">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
</body>
</html>