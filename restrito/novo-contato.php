<?php require_once('header.php'); ?>

<div class="container">
	<fieldset class="card-panel janela1">
		<h5 class="titulo center">Criando contato</h5>
		<form class="form-control col s12" method="POST" action="valida-n-contato.php">
			<div class="input-field col s4">
				<i class="material-icons prefix">account_circle</i>
				<input id="icon_user" name="input_name" type="text" class="validate" required>
				<label for="icon_user">Nome:</label>
			</div>
			<div class="input-field col s4">
				<i class="material-icons prefix">email</i>
				<input id="icon_email" name="input_email" type="email" class="validate" required>
				<label for="icon_email">E-mail:</label>
			</div>

			<div class="input-field col s4">
				<i class="material-icons prefix">phone</i>
				<input id="input_telefone" type="tel" name="input_telefone" class="validate" required>
				<label for="input_telefone">Contato:</label>
			</div>

			<div class="file-field input-field">
				<div class="btn small blue-grey lighten-1" style="padding:2px;">
					<span><i class="material-icons center">file_upload</i> Imagem</span>
					<input type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" name="input_arquivos" type="text">
				</div>
			</div>

			

			<div class="input-field col s4">
				<i class="material-icons prefix">edit</i>
				<input id="input_breve_desc" type="text" name="input_breve_desc" class="validate" required>
				<label for="input_breve_desc">Breve descrição do contato:</label>
			</div>

			<div class="input-field col s6 right">
				<button class="btn green darken-5 waves-effect" name="criar" type="submit"
					href="#modal1">Cadastrar</button>
				<a href="index.php" class="btn red darken-5 waves-effect cancelar">Cancelar</a>
			</div>
		</form>
	</fieldset>
</div>

<?php require_once('footer.php'); ?>