<?php
    session_start();
    $painel = $_SESSION["dadosUser"]["UserPainel"] ? $_SESSION["dadosUser"]["UserPainel"]: "";
    //$user = isset($_SESSION["email"])?($_SESSION["email"]):"";

    $painel_atual = "Admin";
    
    if($painel_atual != $painel){
        $_SESSION['msg'] = "Usuário sem permissão faça login";
        header("Location:../index.php");
    }
    require('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Agenda WEB Com Materialize</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css">
    <link rel="stylesheet" href="estilo.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

<?php
// Validação dos dados

if(isset($_POST['criar'])){
	$nome = filter_input(INPUT_POST, 'input_name', FILTER_SANITIZE_SPECIAL_CHARS);
	$desc = filter_input(INPUT_POST, 'input_breve_desc', FILTER_SANITIZE_STRING);
	$arquivo = $_POST['input_arquivos'] ? $_POST['input_arquivos'] : 'images/user.png';
	$email = filter_input(INPUT_POST, 'input_email', FILTER_SANITIZE_EMAIL);
  $telefone = filter_input(INPUT_POST, 'input_telefone', FILTER_SANITIZE_NUMBER_INT);
  $userId = $_SESSION['dadosUser']['UserId'];
  if($nome == ""){
    $_SESSION['msg'] = 'Preencha os campos para adicionar um contato';
    header("Location: novo-contato.php");
  }else if($email == ""){
    $_SESSION['msg'] = 'Preencha os campos para adicionar um contato';
    header("Location: novo-contato.php");
  }else if($telefone == ""){
    $_SESSION['msg'] = 'Preencha os campos para adicionar um contato';
    header("Location: novo-contato.php");
  }else{
    $sql="INSERT INTO `contato_agenda` (`id`, `name`, `email`, `phone`, `img`,id_usuario`,`description`) VALUES (NULL, '$nome', '$email', '$telefone', '$arquivo', '$userId', '$desc')";
    $insere = mysqli_query($con,$sql);
    if($insere){
      echo "<div class='row container'>
          <div class='card-panel'>
            <h4 class='center '> Dados Informados</h4>
              <ul class='collection'>
                  <li class='collection-item'><span>Nome: </span>$nome</li>
                  <li class='collection-item'><span>E-mail: </span>$email</li>
                  <li class='collection-item'><span>Telefone: </span>$telefone</li>
                  <li class='collection-item'><span>Imagem: </span>$arquivo</li>
              </ul>

              <a href='novo-contato.php'><i class='material-icons'>arrow_back</i> Voltar</a>
          </div>
      </div>";

      echo "<div class='center'><span class='green white-text  card-panel'>Dados Cadastrados com sucesso</span></div>";
    }else{
      $_SESSION['msg'] = 'Erro ao cadastrar contato, tente novamente mais tarde';
      header("Location: novo-contato.php");
    }
  }
   
}

?>


<script type="text/javascript": src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../_includes/css/js/materialize.js"></script>
      
      <script type="text/javascript">
      	 document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.modal');
		    var instances = M.Modal.init(elems, options);
		  });

		  // Or with jQuery

		  $(document).ready(function(){
		    $('.modal').modal();
		  });

		  $(document).ready(function(){
		    $('.cad').click(function(){
		    	window.location.href = "_includes/insert.php";
		    });
		    $('#voltar').click(function(){
		    	window.location.href = "index.php";

		    });
		  });
      </script>

  </body>
  </html>