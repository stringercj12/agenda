<?php session_start();include_once('cone.php'); ?>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="_includes/materialize/css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>


<!-- Validação dos dados '-->
<?php 
if(isset($_POST['cadastrar'])){
	$nome = filter_input(INPUT_POST, 'input_name', FILTER_SANITIZE_SPECIAL_CHARS);
	$senha = MD5(filter_input(INPUT_POST, 'input_senha', FILTER_SANITIZE_NUMBER_INT));
	$email = filter_input(INPUT_POST, 'input_email', FILTER_SANITIZE_EMAIL);

	// Verifica se existe dados no banco de dados
		$verifica = $link->query("select email, usuario from usuarios");
		$array_certifica_email = [];
		$array_certifica_user = [];

	// lista os emails do banco de dados
	while($email_user = $verifica->fetch_assoc()):
		$email_existentes = $email_user['email'];
		$user_existentes = $email_user['usuario'];
		array_push($array_certifica_email,$email_existentes);
		array_push($array_certifica_user,$user_existentes);
	endwhile;

	// Verifica se existe email informado no banco de dados
	if((in_array($email, $array_certifica_email)) AND (in_array($nome,$array_certifica_user))):
		$_SESSION['msg'] = "<p class='center red-text'>".'Já existe um email e usario cadastrado com esses dados'."</p>";
		header("Location:index.php");

	else:
		// se não existe insere os dados
		$queryInsert = $link->query("insert into usuarios values (default,'$nome',$senha','$email')");
		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0):
			$_SESSION['msg'] = "<p class='center green-text'>Cadastro efetuado com sucesso</p><br>";
		endif;
	endif;		


	//  $_SESSION['mensagem'] = "Cadastrado com sucesso!";
	// 	echo "<div class='card-panel'><h4>Os Dados Informados</h4>";
	// 	echo "Nome: ".$nome."<br>";
	// 	echo "E-mail: ".$email."<br>";
	// 	echo "Senha: ".$senha;
	// 	echo "<br><br>";
	// 	echo " <button class='waves-effect green darken-2  waves-deep-orange btn modal-trigger' id='voltar' type='submit' href='#modal1'>Voltar</button>";
	// 	echo "</div>";

}

?>


<script type="text/javascript": src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="css/js/materialize.js"></script>
      
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