<?php   
include 'connexion_base.php';
session_start();
// $id=1;
 // $sql = "SELECT * FROM questions WHERE refQuestionnaire=:ref";
		$sql=("SELECT * FROM questions");
		$data = array();
		//while($row=$sql->fetch()){
			foreach($bdd->query($sql, PDO::FETCH_ASSOC) as $row)
			$data[]=$row; 
			echo json_encode($data);
?>