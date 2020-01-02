<?php 
session_start();
include_once('../conecta.php');
if(isset($_POST['btn-cadastrar']))
{
	$nome = mysqli_escape_string($connect,$_POST['nome']);
	$data = mysqli_escape_string($connect,$_POST['dataCriacao']);
	$status = mysqli_escape_string($connect,$_POST['status']);

	$insert = "INSERT INTO site (nomeSite, data_criacao, status) VALUES ('$nome','$data','$status')";
	if(mysqli_query($connect,$insert))
	{
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location:../index.php');
	}
	else
	{
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location:../index.php');
	}

}





?>