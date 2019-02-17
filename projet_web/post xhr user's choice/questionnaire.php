<?php
include 'connexion_base.php';
session_start();
$userChoice = $_POST["reponse"];   //on recupere ce que le serveur a envoyé (i.e le choix de l'utilisateur)
// $id=1;
if(isset($userChoice)){
    $prepInsert = $bdd->prepare("INSERT INTO reponses (choix) VALUES (:choix)");
    $result = $prepInsert->execute(array("choix"=> $userChoice));  
   ///////------------------------------------ // $sql = "SELECT * FROM questions WHERE refQuestionnaire=:ref";
    $sql=("SELECT * FROM questions");
    $data = array();
        foreach($bdd->query($sql, PDO::FETCH_ASSOC) as $row)
        $data[]=$row; 
        echo json_encode($data);
} 
?>