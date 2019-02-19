<?php
    session_start();
    include 'connexion_base.php';
    $quest=$_SESSION["questions"];
    $id=$_SESSION["idU"];
    $idQ=$_SESSION["idQ"];
    
    if(isset($_POST["valid"]) /*AND isset($_POST["reponse"])*/){
        //save reponses
        $req1=$bdd->prepare("INSERT INTO quizz.reponses(refCandidat,refQuestion,choix,points,temps)     VALUES(?,?,?,?,?)");
        $req1->execute(array(
        $id,
        $idQ,
        $_POST["reponse"],
        50,
        8));
    }
    //charger questions
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizz</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      <div class="row">
       <span class="col-md-12 titre"><span class="sq">SuperQuizz</span></span>
       </div>
       <?php while($d1=$req->fetch()){?>
       <div class="row question text-center">
           <i class="col-md-2"></i>
           <span class="col-md-2">Question<span class="numquestion" id="numquestion">#<?php echo $idQ; ?></span></span><span class="col-md-4 laquestion" id="laquestion"><?php echo $d1["libelle"];?>?</span><span class="col-md-2"><span class="timer"><i class="glyphicon glyphicon-time"> </i> <span id="temps"> 12</span></span></span>
           <i class="col-md-2"></i>
       </div>
        
        <div class="row reponses">
            <form class="text-center"  method="POST" >
              <input name="reponse" type="radio" value="0" checked class="choix0"/>
               <input name="reponse" type="radio" class="" id="lrep1" value="1" />
                <label class="col-md-5 btn btn-primary btn-lg" for="lrep1" id="rep1"><?php echo $d1["choix1"];?></label>
                
                <span class="col-md-2"></span>
                
                <input name="reponse" type="radio" class="" id="lrep2" value="2" />
                <label class="col-md-5 btn btn-primary btn-lg" for="lrep2" id="rep2"><?php echo $d1["choix2"];?></label>
                
                <input name="reponse" type="radio" class="" id="lrep3" value="3" />
                <label class="col-md-5 btn btn-primary btn-lg" for="lrep3" id="rep3"><?php echo $d1["choix3"];?></label>
                
                <span class="col-md-2"></span>
                
                <input name="reponse" type="radio" class="" id="lrep4" value="4" />
                <label class="col-md-5 btn btn-primary btn-lg" for="lrep4" id="rep4"><?php echo $d1["choix4"];}?></label><br/>
                <div class="">
               <input type="submit" id="bvalid" name="valid" class="btn btn-success butvalid" value="Valider" >
           </div>
            </form>
        </div>
        
        <footer class="row">
            <span class="col-md-12 text-center">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>