<?php
    $id=$_SESSION["idU"];
    //recup reponses user
    $sql="SELECT * FROM  quizz.reponses WHERE refCandidat=$id"; 
    $req=$bdd->query($sql);
    //recup nom user
    $sql2="SELECT nom FROM  quizz.candidats WHERE idC=$id"; 
    $req2=$bdd->query($sql2);
    $d2=$req2->fetch();
?>