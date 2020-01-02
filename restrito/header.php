<?php
    session_start();
    $painel = $_SESSION["dadosUser"]["UserPainel"] ? $_SESSION["dadosUser"]["UserPainel"]: "";
    //$user = isset($_SESSION["email"])?($_SESSION["email"]):"";

    $painel_atual = "Admin";
    
    if($painel_atual != $painel){
        $_SESSION['msg'] = "Usuário sem permissão faça login";
        header("Location:../index.php");
    }
    require_once('_includes/alerts.php');
    require('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Agenda WEB Com Materialize</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/css/materialize.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>


<nav class="pink">
  <div class="container">
    <div class="nav-wrapper">
      <a href="./" class="brand-logo">
        <img src="images/agenda-branco.png" alt="" class="img-fluid">
      </a>
      <ul class="right hide-on-med-and-down">
        <li>
          <a class="" href="meu-perfil.php"><i class="material-icons prefix left">face</i>
            <?php echo $_SESSION["dadosUser"]["UserName"]; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>