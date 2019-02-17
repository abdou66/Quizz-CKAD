<?php
include 'connexion_base.php';

if(isset($_POST['username'])){
    session_start ();
    $_SESSION['username']=$_POST['username']; 
    $prepInsert = $bdd->prepare("INSERT INTO candidats (nom) VALUES (:nom)");
    $result = $prepInsert->execute(array("nom"=> $_SESSION ['username']));
    header ('location: questionnaire.html');
} else{    
    echo ("Veuillez renseigner votre nom avant de commencer!!!");
    echo "<br/>";
}
?>