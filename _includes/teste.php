<?php 
include_once('header.php');

?>

<div class="row">
	<div class="card-panel red">asdsa</div>
</div>
 <a class="btn" onclick="Materialize.toast('I am a toast', 3000, 'rounded',function(){alert('chereca')})">Toast!</a>


  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

  <button data-target="modal1" class="btn modal-trigger">Modal1</button>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
          
<br><br><br>
<div class="container">
	<p class="striped">Data/Hora</p>
<?php 
			$dia = Date('d');
			$mes = Date('n');
			$ano = Date('Y');
			$mostra = array('mês incorreto','Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
			
			echo "<p class='striped right'>Rio de Janeiro, $dia de $mostra[$mes] de $ano </p>";
		?>
</div>
<div class="container">
	<p class="striped">Buscando dados locador</p>
	<?php 
			$selec = "SELECT * FROM locador WHERE id_locador='5'";
				$r = mysqli_query($connect,$selec);
			if(mysqli_num_rows($r) > 0 ):
				while ($dados2 = mysqli_fetch_array($r)):
					$_SESSION['id'] = $dados2[0];
					$_SESSION['nome_locador'] = $dados2[1];
					$_SESSION['rg'] = $dados2[2];
					$_SESSION['cpf'] = $dados2[3];
					$_SESSION['endereco'] = $dados2['endereco'];
					$_SESSION['bairro'] = $dados2[5];
					$_SESSION['municipio'] = $dados2[6];
					$_SESSION['uf'] = $dados2[7];
					$_SESSION['nasc'] = $dados2[8];
					$_SESSION['sexo'] = $dados2[9];
					$_SESSION['estado_civil'] = $dados2[10];
					$_SESSION['nacionalidade'] = $dados2[11];
					$_SESSION['nome_conjugue']  = $dados2[12];
					$_SESSION['rg_conjugue'] = $dados2[13];
					$_SESSION['cpf_conjugue'] = $dados2[14];
				endwhile;
			endif;
		?>
</div>



<script type="text/javascript">
	
		Materialize.toast('I am a toast!', 3000, 'rounded')

		$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>

<?php 
	include_once('footer.php');
?>