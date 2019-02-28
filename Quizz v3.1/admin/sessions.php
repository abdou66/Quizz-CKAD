<?php
    session_start();
    include '../includes/connexion_base.php';
    
    //déconnexion
    if(isset($_POST['logout'])) {
        unset($_SESSION["pseudo"]);
        header('Location:../index.html');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions</title>
    <link rel="shortcut icon" href="../images/logo_sq.png"/>
    <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/animate.css"/>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body class="container">
      <div class="row">
       <span class="col-md-12 titre"><span class="sq">SuperQuizz</span></span>
       </div>
       <div class="row interface">
           <div class="col-md-3  menu">
               <a href="accueil.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-home "></i> Accueil</a>
               <a href="sessions.php" class="col-md-12 btn btn-success actif"><i class="glyphicon glyphicon-tasks"></i> Sessions</a>
               <a href="candidats.php" class="col-md-12 btn btn-success"><i class="glyphicon glyphicon-user"></i> Candidats</a>
               <form class="" method="post" action="">
               <i class="col-md-2"></i>
               <button class="btn btn-danger deco col-md-8" name="logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</button>
               <i class="col-md-2"></i>
               </form>
           </div>
           <div class="col-md-9 corps">
               <p class="pseudo"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["pseudo"];?></p>
               <form class="col-md-12 add" enctype="multipart/form-data" method="post" action="">
                   <input type="file" id="fichier1" required />
                    <label class="btn btn-primary glyphicon glyphicon-cloud-upload" for="fichier1" title="Créer une session"></label>
               </form>
               <ul class="col-md-12 row liste text-center">
                  
                   <li class="col-md-12"><a class="row" href="detailSession.php"><span class="col-md-6">"Génie en herbe sur l'informatique"</span><span class="col-md-3">5 candidats</span><span class="col-md-2"> <span class="info">80%</span></span><span class="col-md-1"><label class="btn btn-secondary glyphicon glyphicon-pencil" for="fichier2" title="Modifier cette session"></label></span></a>
                   <input type="file" id="fichier2" required />
                   </li>  
                   
                   <li class="col-md-12"><a class="row" href="detailSession.php"><span class="col-md-6">"Génie en herbe sur l'informatique"</span><span class="col-md-3">5 candidats</span><span class="col-md-2"> <span class="info">80%</span></span><span class="col-md-1"><label class="btn btn-secondary glyphicon glyphicon-pencil" for="fichier2" title="Modifier une session"></label></span></a>
                   <input type="file" id="fichier3" required />
                   </li> 
                     
                     
               </ul>
           </div>
       </div>
        
        
        <footer class="text-center row footer2">
            <span class=" col-md-12 ">© Dramé, Kébé - Sup'Galilée - 2019.</span>
        </footer>
        <script src="script.js"></script>
</body>
</html>