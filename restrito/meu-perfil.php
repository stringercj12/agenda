<?php require_once('header.php');

$sql = "SELECT * FROM usuarios WHERE id = ".$_SESSION['dadosUser']['UserId'];
$r = mysqli_query($con, $sql);
if($r){
    while($d = mysqli_fetch_array($r)){
        $UserId = $d['id'];
        $UserName = $d['name'];
        $UserEmail = $d['email'];
        $UserSenha = $d['senha'];
        $UserPhone = $d['phone'];
        $UserPainel = ['painel'];
        $UserImage = $d['img'];
        $UserDesc = $d['description'];
       
        $dadosUser = array(
            "UserId" => $d['id'],
            "UserName" => $d['name'],
            "UserEmail" => $d['email'],
            "UserSenha" => $d['senha'],
            "UserPhone" => $d['phone'],
            "UserPainel" => ['painel'],
            "UserImage" => $d['img'],
            "UserDesc" => $d['description'],
       );
    }
}


?>

<div class="row mt-5">
    <div class="col s12">
        <div class="container ">
            <a href="users.php" class="btn btn-sm pink">
                <i class="material-icons ">arrow_back</i>
            </a>
            <fieldset class="card-panel">
                <div class="row">
                    <form method="POST" action="_action/update-contact.php">
                        <div class="col s7">
                            <div class="row col s12">
                                <h5 class="pink-text">Detalhes do Contato: <?php echo $dadosUser['UserName']; ?></h5>
                                <p class=""><?php echo $UserDesc ? $UserDesc: 'Breve descrição sobre o contato.'; ?></p>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">fiber_pin</i>
                                    <input id="id_contato" name="id_contato" disabled type="text" class="validate"
                                        value="<?php echo $dadosUser['UserId']; ?>">
                                    <input id="id_contato" name="id_contato" type="hidden" class="validate"
                                        value="<?php echo $dadosUser['UserId']; ?>">
                                    <label for="id_contato">ID:</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_user" name="input_name" type="text" class="validate"
                                        value="<?php echo $dadosUser['UserName']; ?>">
                                    <label for="icon_user">Nome:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="icon_email" name="input_email" type="email" class="validate"
                                        value="<?php echo $dadosUser['UserEmail']; ?>">
                                    <label for="icon_email">E-mail:</label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="input_telefone" type="text" name="input_telefone" class="validate"
                                        value="<?php echo $dadosUser['UserPhone']; ?>">
                                    <label for="input_telefone">Contato:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s5">
                            <div class="center">
                                <div class="grey-text lighten-1">Foto Perfil</div>


                                <div class="center">
                                    <img src="<?php echo $dadosUser['UserImage'] ? $dadosUser['UserImage'] : 'images/user.png'; ?>"
                                        alt="">
                                </div>

                                <div class="">
                                    <a class="modal-trigger trocaImagem tooltipped" href="#drop_img"
                                        data-position="bottom" data-tooltip="Alterar Imagem de Perfil"
                                        data-activates='drop_img'>
                                        Alterar Imagem
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center">
                                    <div class="input-field col s12">
                                        <button class="btn btn-small green darken-5 waves-effect" name="atualizar"
                                            type="submit">
                                            Atualizar
                                        </button>

                                        <a href="_action/delete-contact.php?id=<?php echo $id; ?>&user=<?php echo $_SESSION['dadosUser']['UserId']; ?>"
                                            class="btn btn-small red darken-5 waves-effect cancelar tooltipped"
                                            data-position="bottom" data-tooltip="Deletar o contato">
                                            Deletar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="drop_img" class="modal">
    <div class="modal-content center">
        <form action="_action/update-img.php" method="POST" enctype="multipart/form-data" <h5 class="center">Carregue a
            imagem que deseja</h5>
            <div class="my-3">
                <input type="file" name="im" id="im" class="validate">
                <input id="id_contato" name="id_contato" type="hidden" class="validate"
                    value="<?php echo $dadosUser['UserId']; ?>">
            </div>

            <div class="modal-header center">
                <a href="#" class="modal-close waves-effect waves-green btn-flat">Fechar</a>

                <button class="btn btn-small green darken-5 waves-effect" name="atulizarIMG" type="submit">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('footer.php'); ?>