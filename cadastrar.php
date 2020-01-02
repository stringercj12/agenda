  <!DOCTYPE html>
  <html>
    <head>
	<title>Agenda WEB Com Materialize</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
					<li><a href="./"><i class="material-icons left">arrow_back</i>Voltar</a></li>
                </ul>
            </div>
        </div>
    </nav>
		<?php 
			if(isset($_SESSION['msg'])):
				echo $_SESSION['msg'];
				session_unset();
			endif;
		?>

		<div class="container">
			<fieldset class="card-panel janela1">
				<h5 class="titulo">Criando Cadastro</h5>
				<form class="form-control col s12" method="POST" action="_action/create.php">
					<div class="input-field col s6">
					  <i class="material-icons prefix">account_circle</i>
					  <input id="icon_user" name="input_name" type="text" class="validate">
					  <label for="icon_user">Nome:</label>
					</div>
					<div class="input-field col s6">
					  <i class="material-icons prefix">email</i>
					  <input id="icon_email" name="input_email" type="tel" class="validate">
					  <label for="icon_email">E-mail:</label>
					</div>
					<div class="input-field col s6">
					  <i class="material-icons prefix">lock</i>
					  <input id="icon_senha" name="input_senha" type="tel" class="validate">
					  <label for="icon_senha">Senha:</label>
					</div>
					
					<div class="input-field col s6">
					  <i class="material-icons prefix">phone</i>
					  <input id="icon_telephone" name="phone" type="tel" class="validate">
					  <label for="icon_telephone">Contato:</label>
					</div>
					<div class="input-field col s6">
					  <i class="material-icons prefix">description</i>
					  <input id="desc" name="description" type="tel" class="validate">
					  <label for="desc">Descrição sobre você:</label>
					</div>		
					<div class="input-field col s6">
					  <i class="material-icons prefix">person_pin</i>
					  <select name="painel" class="validate">
						<option>Quem é você ? </option>
						<option values="Admin">Administrador</option>
					  </select>
					</div>	          

				   <button class="waves-effect green darken-2  waves-deep-orange btn modal-trigger" name="cadastrar" type="submit" href="#modal1">Cadastrar</button>

				   <a href="./" class="btn orange waves-effect waves-deep-orange modal-trigger">Cancelar</a>
				</form>
		    </fieldset>
 		</div>

  <!-- Modal Structure -->

 			 




 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
		    $('.volta').location('index.php');
		  });
      </script>
    </body>
  </html>