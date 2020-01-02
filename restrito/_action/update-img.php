<?php
require_once('../../conexao.php');  
session_start();
if(isset($_POST['atulizarIMG'])){
	$arquivo = $_FILES['im'] ? $_FILES['im'] : '';
    $id_contato = filter_input(INPUT_POST, 'id_contato', FILTER_SANITIZE_NUMBER_INT);
    $nome            = $arquivo['name'];//Pega o arquivo e joga no nome
    $tiposPermitidos = ['jpg','jpeg','png'];//São as extensão permitidas para envio
    $tamanho         = $arquivo['size'];//Pega o tamanho do arquivo
    $extensao        = explode('.', $nome);//Pega a extensão depois do caracter informado no comando
    $extensao        = end($extensao); //Pega o conteudo da var no final da divisão de cima
    $novoNome        = rand(0,9999)."-$nome"; //Atribui um novo nome na pasta final como mesmo nome mas acrescentando números

        if(in_array($extensao,$tiposPermitidos)){
            if($tamanho > 100000){
                $_SESSION['msg'] = "O tamanho da imagem excede o limite permitido";
                $id_contato = base64_encode($id_contato);
                return header("Location:../users-detalhes.php?id=".$id_contato);
            }else{
                /*Pega o arquivo da pasta temporaria tmp_name e joga * na nova pasta imagens e no banco*/
                
                $mover = move_uploaded_file($arquivo['tmp_name'],'../images/'.$novoNome);

                
               $caminho = "images/".$novoNome;
                // var_dump($caminho);
                $cadImg = "UPDATE contato_agenda SET img = '$caminho' WHERE id = '$id_contato' ";
                mysqli_query($con,$cadImg);
                $arquivo = $novoNome;
                //Mostrando a imagens da pasta
                // echo "<br/><br/><img src='imagens/$novoNome' class='rounded img-thumbnail'/><br/>";
                
                $_SESSION['msg'] = "Imagem alterada com sucesso";
                $id_contato = base64_encode($id_contato);
                return header("Location:../users-detalhes.php?id=".$id_contato);
            }
        }else{
            $_SESSION['msg'] = "Imagem inválida.<br/>Selecione uma imagem nos formatos <br /> jpg, jpeg ou png.";
            $id_contato = base64_encode($id_contato);
            return header("Location:../users-detalhes.php?id=".$id_contato);
        }
}