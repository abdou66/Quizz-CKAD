<?php
    $id=$_SESSION["idU"];
    //recup reponses user
    $sql="SELECT * FROM  quizz.reponses WHERE refCandidat=$id AND refQuestionnaire=2";//à chnager 
    $req=$bdd->query($sql);
    //recup nom user
    $sql2="SELECT prenom, nom FROM  quizz.candidats WHERE idC=$id"; 
    $req2=$bdd->query($sql2);
    $d2=$req2->fetch();
?>