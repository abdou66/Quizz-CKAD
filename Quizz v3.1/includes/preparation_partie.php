<?php
if(isset($_POST["lancer"])){
        //charger questions
    $idQr=$_SESSION["idQr"];
    $sql="SELECT idq FROM quizz.questions WHERE refQuestionnaire=$idQr"; 
    $req=$bdd->query($sql);
    $tab=array();
    while($d=$req->fetch())
        $tab[]=$d["idq"]; //save id des questions
        
        //save var de sessions
    $_SESSION["questions"]=$tab;
    $_SESSION["idU"]=1; //id user
    $_SESSION["idQ"]=$tab[0]; //id 1ere question
    $_SESSION["indice"]=1; //indice question
        
        //on met fait à 1
    $idC=$_SESSION["idC"];
    $req2=$bdd->prepare("UPDATE quizz.candsession SET fait=1  WHERE refQuestionnaire=$idQr AND refCandidat=$idC");
    $req2->execute();
    header('Location:questionnaire.php');
    }
?>