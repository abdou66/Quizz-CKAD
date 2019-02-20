<?php
    session_start();
    include 'connexion_base.php';
    $id=$_SESSION["idU"];
    //recup reponses user
    $sql="SELECT * FROM  quizz.reponses WHERE refCandidat=$id"; 
    $req=$bdd->query($sql);
    //recup nom user
    $sql2="SELECT nom FROM  quizz.candidats WHERE idC=$id"; 
    $req2=$bdd->query($sql2);
    $d2=$req2->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      <div class="row">
       <span class="col-md-12 titre"><span class="sq">SuperQuizz</span></span>
       </div>
       
        <div class="row resultats">
            <h4 class="col-md-12 petittitre"><u>Résultats de <?php echo ucfirst($d2["nom"]);?></u></h4>
            <table  class="col-md-10 table table-hover table-bordered text-center" id="tableau">
                <tr><th>#</th><th class="">Question</th><th>La réponse</th><th>Ta réponse</th><th><i class="glyphicon glyphicon-record"></i></th><th>Points gagnés</th><th>Temps (s)</th><th>Coef.</th></tr>
                <?php 
                    $s=0;
                    while($d=$req->fetch()){
                    $ref=$d["refQuestion"];
                    $sql1="SELECT * FROM  quizz.reponses AS r, quizz.questions AS q  WHERE q.idq=$ref"; 
                    $req1=$bdd->query($sql1);
                    $d1=$req1->fetch();
                    //emoji
                    if($d["points"]) $m="smile.png"; else $m="sad.png";
                    //total
                    $s+=$d["points"];
                ?>
                <tr><td><?php echo $d["refQuestion"];?></td><td><?php echo $d1["libelle"];?></td><td><?php echo $d1["choix".$d1["reponse"]];?></td><td><?php if($d["choix"]) echo $d1["choix".$d["choix"]];?></td><td><img width="30" height="30" class="emoji" src="images/<?php echo $m;?>"/></td><td><?php echo $d["points"];?></td><td><?php echo $d["temps"];?></td><td><?php echo $d1["coef"]."%";}?></td></tr>
            </table>
        </div>
        <br/>
        <div class="row total float-right">
            <h3 class="alert alert-warning"><?php echo $s;?> pts !</h3>
        </div>
        <br/>
        <div class="row text-center retour">
        <a href="index.html" class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Retour à l'accueil</a>
        </div>
        <footer class="row">
            <span class="col-md-12 text-center">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
</body>
</html>