<?php
    session_start();
    include 'includes/connexion_base.php';
    $msg="";
    if(isset($_POST["insc"])){
        if($_POST["mdp1"]==$_POST["mdp2"]){
            $req=$bdd->prepare("INSERT INTO quizz.candidats(nom,prenom,motDePasse,pseudo) VALUES(?,?,?,?)");
            $req->execute(array(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["mdp1"],
            $_POST["pseudo"]
            ));
            header('Location:connexion.php');
        }
        else $msg="Les mots de passe ne correspondent pas.";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="shortcut icon" href="images/logo_sq.png"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/animate.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">
      
        <div class="row text-center inscription">
           <form class="form-signin" method="post">
              <span class="col-md-12 titre "><span class="sq"><div class="animated bounce">SuperQuizz</div></span></span>
              <div class="connect">
              <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-user"></i></div>
                    </div>
                    <input type="text" name="pseudo" id="" class="form-control" placeholder="Pseudo" required>
              </div>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-tag"></i></div>
                    </div>
                    <input type="text" name="prenom" id="" class="form-control" placeholder="Prénom" required>
              </div>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-tags"></i></div>
                    </div>
                    <input type="text" name="nom" id="" class="form-control" placeholder="Nom" required>
              </div>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-lock"></i></div>
                    </div>
                    <input type="password" name="mdp1" id="" class="form-control" placeholder="Mot de passe" required>
              </div>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="glyphicon glyphicon-lock"></i></div>
                    </div>
                    <input type="password" name="mdp2" id="" class="form-control" placeholder="Confimer mot de passe" required>
              </div><br>
              <button class="btn btn-lg btn-primary btn-block" name="insc"><i class="glyphicon glyphicon-new-window"></i> S'inscrire</button>
              <span class="sousbout">Déjà membre ? <a href="connexion.php" class="">Se connecter</a></span><br>
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