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
					<li><a href="cadastrar.php">Cadastre-se</a></li>
					<li><a href="./"><i class="material-icons left">arrow_back</i>Voltar</a></li>
                </ul>
            </div>
        </div>
    </nav>

		<div class="container">
			<fieldset class="card-panel">
				<h5 class="titulo">Recuperação de Senha</h5>
				<form class="form-control col s12" method="POST" action="_action/recuperar.php">
					<div class="input-field col s6">
					  <i class="material-icons prefix">email</i>
					  <input id="icon_email" name="email" type="text" class="validate">
					  <label for="icon_email">Endereço de E-email</label>
					</div>
					<div class="col s6">
						<button class="btn green waves-effect waves-deep-purple ">Enviar </button>
					</div>

				</form>
		    </fieldset>
 		</div>


 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="css/js/materialize.js"></script>
      
      <script type="text/javascript">
      	$(function(e){
      		$(".input-field").attr("<a href=''>Clique Aqui</a>");
      	})
      </script>
    </body>
  </html>