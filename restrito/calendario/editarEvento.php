<?php

// Conexion a la base de datos
require_once('bdd.php');

if (isset($_POST['editarEvento'])){
	
	
    $id = $_POST['id'];
    $title = $_POST['title'];
	$color = $_POST['color'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$status = $_POST['status'];

	$sql = "UPDATE events SET title = '$title', color = '$color', start = '$start', end = '$end', status = '$status' WHERE id = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error');
    }
    
    header("Location: detalhesevento.php?pg=".$id);
}
else if(isset($_POST['adiarAll'])){
    
    $status = "Adiado";
    
    $sql = "UPDATE events SET status = '$status'";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error');
    }
    
    header("Location: listaeventos.php");
}else if($_GET['url_adiar']){

    $sql = "DELETE FROM events WHERE id = ?"; 
    $query = $bdd -> prepare($sql);
    $query->bindValue(1, $_GET['url_adiar']);
    $res = $query -> execute();
    
    header("Location: listaeventos.php");

}
	
?>
