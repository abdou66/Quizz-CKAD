<?php
    session_start();
    include '../includes/connexion_base.php';
    $sql="SELECT * FROM quizz.candidats"; //tous les candidats
    $req=$bdd->query($sql);
    
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
    <title>Candidats</title>
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
               <a href="sessions.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-tasks"></i> Sessions</a>
               <a href="candidats.php" class="col-md-12 btn btn-success actif"><i class="glyphicon glyphicon-user"></i> Candidats</a>
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <p class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></p>
               
               <ul class="col-md-12 row liste text-center">
                  <?php while($d=$req->fetch()){ 
                    $id=$d['idC'];
                    $sql1="SELECT * FROM quizz.candsession WHERE refCandidat=$id"; //and block=0 nb de sessions 
                    $req1=$bdd->query($sql1);
                    $sql2="SELECT refQuestionnaire, SUM(points) AS pts FROM quizz.reponses WHERE refCandidat=$id GROUP BY refQuestionnaire";//points par session
                    $req2=$bdd->query($sql2);
                    //calcul de la moyenne des points
                    $n=0; $som=0;
                    while($d2=$req2->fetch()){
                        $som+=$d2["pts"];
                        $n++;
                    }
                   ?>
                   <li class="col-md-12"><a class="row col-md-12"><span class="col-md-5"><?php echo ucfirst($d['prenom'])." ".ucfirst($d['nom']);?></span><span class="col-md-4"><?php echo $req1->rowCount();?> session(s)</span><span class="col-md-3">Moy: <span class="info"><?php echo ($req2->rowCount())? round($som/$n):"--"; ?>/20</span></span></a></li>  
                   <?php } ?>
               </ul>
           </div>
       </div>
        
        
        <footer class="text-center row footer2">
            <span class=" col-md-12 ">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>