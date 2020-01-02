<?php
require_once('../../conexao.php');
session_start();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$user = $_GET['user'];

	$del = "DELETE FROM `contato_agenda` WHERE `id` = $id AND id_usuario = '$user'";
	$resultado = mysqli_query($con,$del);
	$res = mysqli_num_rows($resultado);

	if($resultado){
		$_SESSION['msg'] = "Excluido com sucesso";
		
		return header("Location:../users.php");
	}else{
		$_SESSION['msg'] = "Erro ! Ao excluir arquivo";
		header("Location:../users.php");
		return;
	}
}