<?php
    $quest=$_SESSION["questions"];
    if(!count($quest)){
        unset($_SESSION["questions"]);
        unset($_SESSION["idQ"]);
        header('Location:resultat.php');
    }
    else{
        $idQ=$quest[0];
        $_SESSION["idQ"]=$idQ;
        array_shift($quest);
        $_SESSION["questions"]=$quest;
        $sql="SELECT * FROM  quizz.questions WHERE idq=$idQ"; 
        $req=$bdd->query($sql);
    }
?>