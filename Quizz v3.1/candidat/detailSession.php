<?php
    session_start();
    include '../includes/connexion_base.php';
    $idC=$_SESSION["idC"];
    $idQ=$_GET["id"];
    //si session pas faite
    $sql0="SELECT fait FROM quizz.candSession WHERE refQuestionnaire=$idQ AND refCandidat=$idC"; 
    $req0=$bdd->query($sql0);
    $d0=$req0->fetch();
    if(!$d0["fait"]){
        $_SESSION["idQr"]=$idQ;
        header("Location:presentation.php");
    }
    //get results cand.
    $sql="SELECT * FROM quizz.reponses WHERE refQuestionnaire=$idQ AND refCandidat=$idC"; 
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
              <span class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></span>
               <div class="resultats">
                <h5 class="col-md-12 petittitre"><u><div class="animated slideInLeft">Vos résultats</div></u></h5>
                <table  class="col-md-10 table table-hover table-bordered text-center animated zoomIn" id="tableau">
                    <tr><th>#</th><th class="">Question</th><th>La réponse</th><th>Votre réponse</th><th><i class="glyphicon glyphicon-record"></i></th><th>Points gagnés</th><th>Temps (s)</th><th>Coef.</th></tr>
                    <?php 
                        $s=0; $i=1;
                        while($d=$req->fetch()){
                        $ref=$d["refQuestion"];
                        $sql1="SELECT * FROM  quizz.reponses AS r, quizz.questions AS q  WHERE q.idq=$ref"; 
                        $req1=$bdd->query($sql1);
                        $d1=$req1->fetch();
                        //total
                        $s+=$d["points"]; 
                        //emoji
                        if($d["points"]) $m="smile.png"; else $m="sad.png";
                    ?>
                    <tr><td><?php echo $d["refQuestion"];?></td><td><?php echo $d1["libelle"];?></td><td><?php echo $d1["choix".$d1["reponse"]];?></td><td><?php if($d["choix"]) echo $d1["choix".$d["choix"]];  else echo "<em>Vous n'avez pas répondu</em>"?></td><td><img width="30" height="30" class="emoji" src="../images/<?php echo $m;?>"/></td><td><?php echo $d["points"];?></td><td><?php echo $d["temps"];?></td><td><?php echo $d1["coef"]."%";?></td></tr>
                    <?php $i++;}?>
                    <tr><td colspan="4"></td><td>Total</td><td class="animated zoomIn"><?php echo $s;?>/20</td><td colspan="2"></td></tr>
                    
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