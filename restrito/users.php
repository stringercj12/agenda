<?php require_once('header.php'); ?>

<div class="row mt-5">
    <div class="col s12">
        <div class="container ">
            <div class="card-panel">
                <h5 class="pink-text center">Lista de Contatos</h5>
                <p class="center">Aqui você realizará os melhores contatos da sua vida! :)</p>

                <ul class="collection">
                    <?php
                        $sql = "SELECT * FROM contato_agenda WHERE id_usuario = ".$_SESSION['dadosUser']['UserId'];
                        $r = mysqli_query($con, $sql);
                        if($r):
                            while($d = mysqli_fetch_array($r)):
                                $UserId = $d['id'];
                                $UserName = $d['name'];
                                $UserEmail = $d['email'];
                                $UserPhone = $d['phone'];
                                $UserImage = $d['img'];
                        
                    ?>
                    <li class="collection-item avatar">
                        <img src="<?php echo $UserImage; ?>" alt="" class="circle">
                        <strong><span class="title"><?php echo $UserName; ?></span></strong>
                        <p>
                           <a href="mailto: <?php echo $UserEmail;?>" class="pink-text">
                                <?php echo $UserEmail;?>
                            </a>
                        </p>
                        <div>          
                            <?php $id = base64_encode($UserId); ?>   
                            <a href="users-detalhes.php?id=<?php echo $id ?>" class="secondary-content pink-text tooltipped modal-trigger" data-position="bottom" data-tooltip="Ver dados">
                                <i class="material-icons ">contacts</i>
                            </a>
                        </div>
                    </li>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<?php require_once('footer.php'); ?>