<?php
$serveur ='localhost';
$login ='root';
$mdp ='';
$nom_bdd='quizz';

try
{
    $bdd = new PDO('mysql:host='.$serveur.';dbname='.$nom_bdd.'', $login, $mdp,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
}
catch (Exception $e)
{
    exit('Erreur : ' . $e->getMessage());
}
?>