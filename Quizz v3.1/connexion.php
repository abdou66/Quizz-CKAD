<?php
    session_start();
    include 'includes/connexion_base.php';

    $msg="";
    if(isset($_POST["login"]) && !empty($_POST["pseudo"]) && !empty($_POST["mdp"])){
        //si c'est un admin
        $sql="SELECT * FROM quizz.admin WHERE pseudo='".$_POST['pseudo']."' AND motDePasse='".$_POST['mdp']."'";
        $req=$bdd->query($sql);
        if($req->rowCount()){
                $_SESSION["pseudo"]=ucfirst($_POST["pseudo"]);
                header('Location:admin/accueil.php');
        }
        //si c'est un candidat
        $sql1="SELECT * FROM quizz.candidats WHERE pseudo='".$_POST['pseudo']."' AND motDePasse='".$_POST['mdp']."'";
        $req1=$bdd->query($sql1);
        if($req1->rowCount()){
                $d=$req1->fetch();
                $_SESSION["nom"]=ucfirst($d["prenom"])." ".ucfirst($d["nom"]);
                $_SESSION["idC"]=$d["idC"];
                $_SESSION["pseudo"]=ucfirst($_POST["pseudo"]);
                header('Location:candidat/accueil.php');
        }
        else $msg="Pseudo ou mot de passe incorrect !";
                
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/animate.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      <div class="row text-center login">
           <form class="form-signin" method="post">
              <span class="col-md-12 titre"><span class="sq"><div class="animated bounce">SuperQuizz</div></span></span>
              <div class="connect">
              <h1 class="h3 mb-3 font-weight-normal">Login</h1>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-user"></i></div>
                    </div>
                    <input type="text" id="" name="pseudo" class="form-control" placeholder="Pseudo" required>
              </div>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-lock"></i></div>
                    </div>
                    <input type="password" name="mdp" id="" class="form-control" placeholder="Mot de passe" required>
              </div><br>
              <button class="btn btn-lg btn-primary btn-block" name="login"><i class="glyphicon glyphicon-log-in"></i> Se connecter</button>
              <span class="sousbout">Pas encore membre ? <a href="inscription.php" class="">S'inscrire</a></span><br>
              <span style="color:red;font-size:12px;"><?php echo $msg; ?></span>
            </div>
            </form>
       </div>
       

        <footer class="row footer1">
            <span class="col-md-12 text-center">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>