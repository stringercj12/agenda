<?php
require_once('../../conexao.php');  
session_start();
if(isset($_POST['atualizar'])){
	$nome = filter_input(INPUT_POST, 'input_name', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'input_email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'input_telefone', FILTER_SANITIZE_NUMBER_INT);
    $id_contato = filter_input(INPUT_POST, 'id_contato', FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['dadosUser']['UserId'];


    // var_dump($arquivo,$arquivo['name']); exit();
   

    $sql = "UPDATE contato_agenda SET name = '$nome', email = '$email', phone = '$telefone' WHERE id = '$id_contato' ";
    $res = mysqli_query($con,$sql);

    
	if($res){
		$_SESSION['msg'] = "Alterado com sucesso";
		$id_contato = base64_encode($id_contato);
		return header("Location:../users-detalhes.php?id=".$id_contato);
	}else{
		$_SESSION['msg'] = "Erro ! Ao alterar usuário";
		$id_contato = base64_encode($id_contato);
		header("Location:../users-detalhes.php?id=".$id_contato);
		return;
	}
}

