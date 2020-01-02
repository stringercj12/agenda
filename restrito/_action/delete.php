<?php
include('../conecta.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$del = "DELETE FROM `site` WHERE `id` = $id";
	$resultado = mysqli_query($con,$del);
	if($res = mysqli_num_rows($resultado)){
		$_SESSION['msg'] = "Excluido com sucesso";
		header("Location:../index.php");
	}else{
		$_SESSION['msg'] = "Erro ! Ao excluir arquivo";
		header("Location:../index.php");
	}
}