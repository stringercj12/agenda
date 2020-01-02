<?php
require_once('bdd.php');

$pg = trim($_GET['pg']);
$sql = "SELECT * FROM events WHERE id = ?";

$req = $bdd->prepare($sql);
$req->bindValue(1, $pg, PDO::PARAM_INT);
$req->execute();

$events = $req->fetchAll();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendário</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
	#FormEdit{
		display: none;
	}
	.prev-cor{
		width: 30px;
    	height: 30px;
		border-radius: 50%;
		padding: 5px;
	}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Calendário</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Menu
							<span class="caret"></span>
						</a>
						 <ul class="dropdown-menu" aria-labelledby="dLabel">
							<li>
								<a href="index.php">Adicionar um evento</a>
							</li>
							<li>
								<a href="listaeventos.php">Todos os eventos</a>
							</li>
						</ul>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<h4>Detalhes do evento</h4>
					</div>
					 <!-- Table -->
					<table class="table">
						<!-- On rows -->
						<tr>
						  <th>Titulo</th>
						  <th>Início</th>
						  <th>Término</th>
						  <th>Status</th>
						</tr>
						<?php foreach($events as $event):?>
						<tr>
						  <th><?php echo $event['title'];?></th>
						  <th><?php echo date("d/m/Y", strtotime($event['start']));?></th>
						  <th><?php echo date("d/m/Y", strtotime($event['end']));?></th>
						  <th><?php echo $event['status'];?></th>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<h4>Ações sobre o evento</h4>
					</div>
				  <!-- Table -->
				  <table class="table text-uppercase">
					<!-- On rows -->
					<tr class="text-center">
					  <th class="text-center text-danger"><a href="deleteEventos.php?url_del=<?php echo $event['id'];?>">Deletar</a></th>
					  <th class="text-center text-success"><a href="#" id="editar">Editar</a></th>
					  <th class="text-center text-warning"><a href="editarEvento.php?url_adiar=<?php echo $event['id'];?>">Adiar</a></th>
					</tr>
				  </table>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-10 col-centered">
				<div class="panel panel-default" id="FormEdit">
					<div class="panel-heading">
						<h4>Editando o evento: <?php echo $event['title'];?></h4>
					</div>
						
					<div class="panel-body">
						<form action="editarEvento.php" method="post">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?php echo $event['id']; ?>">
							</div>
							<div class="form-group">
								<label for="title" class="control-label">Titulo</label>
								<input type="text" name="title" class="form-control" id="title" value="<?php echo $event['title']; ?>">
							</div>
							<div style="border-radius: 4px !important;" class="input-group" >
								<label for="color" class="control-label">Cor</label>
									<select name="color" class="form-control" id="color" style="border-radius: 4px !important;" >
										<option style="color: <?php echo $event['color']; ?>" value="<?php echo $event['color']; ?>">
											Cor atual do evento: <?php echo $event['color']; ?>
										</option>
										<option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
										<option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
										<option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
										<option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
										<option style="color:#000;" value="#000">&#9724; Negro</option>
									</select>

									<span class="input-group-btn" style="padding: 25px 5px;">
										<div class="prev-cor" style="background-color: <?php echo $event['color']; ?>"></div>
									</span>
							</div>


							<div class="form-group"> 
								<select name="status" class="form-control">
									<option value="<?php echo $event['status']; ?>">
										Status atual: <?php echo $event['status']; ?>
									</option>
									<option value="Confirmado">Confirmado</option>
									<option value="Adiado">Adiado</option>
									<option value="Finalizado">Finalizado</option>
									<option value="Cancelado">Cancelado</option>
								</select>
							</div>

							<div class="form-group"> 
								<label for="color" class="control-label">Início do evento</label>
								<input type="text" class="form-control" name="start" value="<?php echo $event['start'];?>">
							</div>
							<div class="form-group"> 
								<label for="color" class="control-label">Término do evento</label>
								<input type="text" class="form-control" name="end" value="<?php echo $event['end'];?>">
								<p><small class="text-danger">Atenção data deve ser informado no formato Ano/mês/dia hora:minuto:segundo.</small></p>
							</div>

							<div class="form-group">
								<button type="submit" name="editarEvento" class="btn btn-success">Atualizar</button>
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/es.js'></script>
	<script>
		$('#editar').click(function(){
			$('#FormEdit').toggle('show');
		});
		$('#color').change(function(){
			var cor = $('#color').val();
			$('.prev-cor').css({'background': cor});
		});
	</script>
</body>
</html>
