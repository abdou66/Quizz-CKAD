<?php
    session_start();
    include '../includes/connexion_base.php';
    //get sessions
    $id=$_SESSION["idC"];
    $sql="SELECT * FROM quizz.questionnaire AS q, quizz.candsession AS c WHERE q.idQ=c.refQuestionnaire AND c.refCandidat=$id"; //quest. ou le cand. est insc
    $req=$bdd->query($sql);
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
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger deco col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <p class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></p>
               
               <ul class="col-md-12 row liste text-center">
                  <?php while($d=$req->fetch()){ 
                   //nb de cand par sess.
                    $idQ=$d["idQ"];
                    $sql2="SELECT refQuestionnaire, COUNT(refCandidat) AS nbC FROM quizz.candsession WHERE refQuestionnaire=$idQ GROUP BY refQuestionnaire";
                    $req2=$bdd->query($sql2);
                    $d2=$req2->fetch();
                    //nb pts sur la sess.
                    $sql3="SELECT refQuestionnaire, SUM(points) AS pts FROM quizz.reponses WHERE refQuestionnaire=$idQ GROUP BY refQuestionnaire";
                    $req3=$bdd->query($sql3);
                    $d3=$req3->fetch();
                   ?>
                   <li class="col-md-12"><a class="row" href="detailSession.php?id=<?php echo $d["idQ"];?>"><span class="col-md-6">"<?php echo $d["libelle"];?>"</span><span class="col-md-3"> <?php echo $d2["nbC"];?> candidat(s) en lice</span><span class="col-md-2"> <span class="info"><?php echo ($d["fait"])?$d3["pts"]:"--";?>/20</span></span><span class="col-md-1"><span class="btn btn-secondary glyphicon glyphicon-<?php echo ($d["fait"])?"ok":"remove";?>" for="fichier2" title="Modifier cette session"></span></span></a>
                   </li>  
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