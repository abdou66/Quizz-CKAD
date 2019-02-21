<?php
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