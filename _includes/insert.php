<?php 
include_once('../cone.php');
session_start();

$nome = $_SESSION['input_name'];
$senha = $_SESSION['input_senha'];
$email = $_SESSION['input_email'];

$verifica = "SELECT * FROM `usuarios` WHERE email = '$email'";

$testa = mysqli_query($con,$verifica);

	while ($tem = mysqli_fetch_array($testa)) {
		$dados1 = $tem['id_login'];
		$dados = $tem['email'];
	}
	if(isset($dados) == $email){
		echo "Não cadastrado, Já existe esse usuário<br>";
		echo "<a href='../login.php'>Voltar</a><br>";
		echo $nome."<br>".$email."<br>".$senha."<br><br>";
	}else{
		$sql = "INSERT INTO `usuarios` (`id_login`, `usuario`, `senha`, `email`) VALUES (NULL, '$nome', '$senha', '$email')";
			$teste = mysqli_query($con,$sql);
				echo "Cadastrado<br>";
					echo "<a href='../login.php'>Voltar</a><br>";
						echo $nome."<br>".$email."<br>".$senha;
	}



session_start();
include_once('../cone.php');
if(isset($_GET['insert.php']))
{

	$insert = "INSERT INTO `usuarios` (`id_login`, `usuario`, `senha`, `email`) VALUES (NULL, '$nome', '$senha', '$email')";
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