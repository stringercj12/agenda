<?php
require_once('bdd.php');


$sql = "SELECT * FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
$e = count($events);
$escolha = false;
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

		.col-centered {
			float: none;
			margin: 0 auto;
		}
		table tr th {
			text-align: center;
		}
	</style>
</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
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
			<div class="col-lg-5 col-centered">

				<table class="table table-hover text-center">
					<thead>
						<tr style="background-color: #ccc;">
							<th>Eventos (<?php echo $e; ?>)</th>
							<th>Status</th>
							<th>Data</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if($e > 0):
								foreach($events as $event):
						?>
						<tr>
							<td>
								<a href="detalhesevento.php?pg=<?php echo $event['id']; ?>" style="color: <?php echo $event['color']; ?>">
									<?php echo $event['title']; ?>
								</a>
							</td>
							<td>
								<?php echo $event['status']; ?>
							</td>
							<td>
								<?php echo date("d/m/Y", strtotime($event['start'])); ?>
							</td>
						</tr>
						
					<?php
						endforeach;
						else :
					?>
					
						<tr>
							<td class="text-primary" colspan="3">
								Nenhum evento foi criado, 
								<a href="index.php">criar novo</a>
							</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<div class="row">
							<?php
								if($e > 0){
							?>

								<div class="col-lg-6">
									<form class="" method="post" action="deleteEventos.php">
										<div class="form-group">
											<input type="hidden" name="dele" value="all">
											<button type="submit" name="deletar" class="btn btn-danger" id="del">
												<span class="glyphicon glyphicon-trash"></span>
												Deletar Todos
											</button>
										</div>
									</form>
								</div>
								<div class="col-lg-6">
									<form action="editarEvento.php" class="" method="post">
										
										<div class="form-group">
											<input type="hidden" name="adiar" value="all">
											<button type="submit" name="adiarAll" class="btn btn-warning">
												<span class="glyphicon glyphicon-off"></span> 
												Adiar Todos
											</button>
										</div>
									</form>
								</div>

								
								<?php }else{ ?>
									<a href="index.php" class="btn btn-success">
										<span class="glyphicon glyphicon-off"></span> 
										Novo Evento
									</a>
								<?php } ?>
						</div>
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
</body>

</html>