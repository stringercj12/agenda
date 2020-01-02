<?php
session_start();
include_once('../conexao.php');

if(isset($_POST['email'])){
	$email = mysqli_escape_string($con,$_POST['email']);
	

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	if(mysqli_query($con,$sql)){

		$update = "UPDATE usuarios SET senha = 'agenda@123' WHERE email = '$email'";
		if(mysqli_query($con,$update))
		{
			

			$from = "no-reply-agenda@stringercj12.ga";

			$to = $email;

			$subject = "[Agenda] - Alteração/Reset de senha";

			$message = "Olá, Segue abaixo sua nova senha<br><br> Senha: agenda@123";

			$headers = "De:". $from;

			if(mail($to, $subject, $message, $headers)){
				$_SESSION['msg'] = "E-mail enviado com sucesso! Caso tenha cadastro receberá em seu e-mail uma nova senha";
				header('Location:../lembrarsenha.php');
			}

		}
		else
		{
			$_SESSION['msg'] = "Erro ao enviar email";
			header('Location:../lembrarsenha.php');
		}
	}
	else
	{
		$_SESSION['msg'] = "Não foi localizado nenhum usuário com esse e-mail!";
		header('Location:../lembrarsenha.php');
	}
}
