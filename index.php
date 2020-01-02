<?php
	require_once('_includes/mensagem.php');
	require_once('conexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Agenda WEB Com Materialize</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/estilo.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <nav class="pink">
        <div class="container">
            <div class="nav-wrapper">
                <a href="./" class="brand-logo">
					<img src="restrito/images/agenda-branco.png" alt="" class="img-fluid">
				  </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="lembrarsenha.php">Esqueci Minha Senha</a></li>
                    <li><a href="cadastrar.php">Cadastre-se</a></li>
                </ul>
            </div>
        </div>
    </nav>

	<div class="container">
		<div class="row">
			<div class="col s12">
				<fieldset class="card-panel">
					<h5 class="titulo">Tela de Login</h5>
					<form class="form-control col s12" method="POST" action="">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="icon_prefix" name="input_email" type="text" class="validate">
							<label for="icon_prefix">Endereço de E-email</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">edit</i>
							<input id="input_senha" name="input_senha" type="tel" class="validate">
							<label for="input_senha">Senha:</label>
						</div>


						<div class="col s6">
							<button class="btn orange waves-effect waves-deep-blue" name="logar" type="submit">Logar</button>
						</div>

					</form>
				</fieldset>
			</div>
		</div>
	</div>

    <?php 
 				if(isset($_POST['logar'])){
 					$login = filter_input(INPUT_POST, 'input_email', FILTER_SANITIZE_EMAIL);
 					$senha = filter_input(INPUT_POST, 'input_senha', FILTER_SANITIZE_NUMBER_INT);
					
					$sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";
					 $r = mysqli_query($con, $sql);
					 if($r){
						 while($d = mysqli_fetch_array($r)){
							 $UserId = $d['id'];
							 $UserName = $d['name'];
							 $UserEmail = $d['email'];
							 $UserPainel = $d['painel'];

							 echo $UserName;
							 $dadosUser = array(
								"UserId" => $d['id'],
								"UserName" => $d['name'],
								"UserEmail" => $d['email'],
								"UserPainel" => $d['painel'],
							);
						 }
						 
						 $_SESSION['dadosUser'] = $dadosUser;
						 header("Location:restrito/");
					 }
					 else
					 {
						$_SESSION['msg'] = "Usuário/senha incorretos tente novamente";
						header("Location:index.php");
					}

 				}
 			?>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./css/js/materialize.js"></script>

    <script type="text/javascript">
        $(function (e) {
            $(".input-field").attr("<a href=''>Clique Aqui</a>");
        })
        var toastElement = document.querySelector('.toast');
        var toastInstance = M.Toast.getInstance(toastElement);
        setTimeout({

            M.toast({ html: 'I am a toast!' })
        }, 200);
    </script>
</body>

</html>