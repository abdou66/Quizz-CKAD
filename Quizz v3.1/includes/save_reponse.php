<?php
    $id=$_SESSION["idU"];
    $idQ=$_SESSION["idQ"]; //id question
    $idQr=$_SESSION["idQr"]; //id questionnaire
    if(isset($_POST["valid"])){
        $_SESSION["indice"]++;
        //calcul points
        $sql0="SELECT coef, reponse FROM  quizz.questions WHERE idq=$idQ"; 
        $req0=$bdd->query($sql0);
        $d1=$req0->fetch();
        $p=1;
        if($d1["reponse"]!=$_POST["reponse"]) $p=0; 
        $coef=$d1["coef"];
        $time=12-(int)$_POST["timer"];
        $point=$p*ceil(((12-($time))*$coef)/60);
        //save reponses
        $req1=$bdd->prepare("INSERT INTO quizz.reponses(refCandidat,refQuestion,choix,points,temps,refQuestionnaire) VALUES(?,?,?,?,?,?)");
        $req1->execute(array(
        $id,
        $idQ,
        $_POST["reponse"],
        $point,
        $time,
        $idQr)); 
    }
?>