<?php
    session_start();
    include 'connexion_base.php';
    
    if(isset($_POST["lancer"]) AND !empty($_POST["nom"])){
    $req=$bdd->prepare("INSERT INTO quizz.candidats(nom) VALUES(?)");
    $req->execute(array($_POST["nom"]));
        
        //charger questions
    $sql="SELECT idq FROM quizz.questions"; 
    $req=$bdd->query($sql);
    $tab=array();
    while($d=$req->fetch())
        $tab[]=$d["idq"]; //save id des questions
        
        //select id du candidat (le dernier champ)
    $sql1="SELECT idC FROM quizz.candidats"; 
    $req1=$bdd->query($sql1);
    while($d1=$req1->fetch()) $id=$d1["idC"];
        //save var de sessions
    $_SESSION["questions"]=$tab;
    $_SESSION["idU"]=$id; //id user
    $_SESSION["idQ"]=$tab[0]; //id 1ere question
        
    header('Location:questionnaire.php');
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Présentation</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      <div class="row">
       <span class="col-md-12 bienvenue"><span class="sq">SuperQuizz</span></span>
       </div>
       
       <div class="row justify-content-center">
          <h4 class="col-md-12 text-center petittitre"><u>Règles du jeu</u></h4>
           <ul class="col-md-12 text-center regles">
               <li>Vous disposez de 10 questions.</li>
               <li>Chaque question est timeboxée.</li>
               <li>Moins vous utiliserez de temps, plus vos points seront importants.</li>
               <li>Si le compteur tombe à 0, la question est invalidée et on passe à la suivante.</li>
               <li>Les questions valent des points variables.</li>
               <li>Vous disposez de 10 secondes pour répondre à chacune des questions.</li>
           </ul>
        </div><br/>
        
        <div class="row">
        <form class="text-center"  method="POST">
          <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="glyphicon glyphicon-user"></i></div>
            </div>
          <input type="text" name="nom"  class="form-control" id="nom" placeholder="Entrez votre nom" required>
          </div>
           <div class="bout">
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