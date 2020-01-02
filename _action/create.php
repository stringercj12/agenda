<?php 
session_start();
include_once('../conexao.php');
if(isset($_POST['btn-cadastrar']))
{
	$nome = mysqli_escape_string($con,$_POST['input_nome']);
	$email = mysqli_escape_string($con,$_POST['input_email']);
	$senha = mysqli_escape_string($con,$_POST['input_senha']);
	$phone = mysqli_escape_string($con,$_POST['phone']);
	$painel = mysqli_escape_string($con,$_POST['painel']);
	$description = mysqli_escape_string($con,$_POST['description']);

	$insert = "INSERT INTO usuarios (nome,email,senha,phone,painel,description) VALUES ('$nome','$email','$senha', '$phone','$painel','$description')";
	if(mysqli_query($con,$insert))
	{
		
		$_SESSION['msg'] = "Cadastrado com sucesso!";
		header('Location:../index.php');
	}
	else
	{
		$_SESSION['msg'] = "Erro ao cadastrar!";
		header('Location:../index.php');
	}

}





?>