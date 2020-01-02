<?php
    session_start();
    $_SESSION['log'] = 1;
    $_SESSION['msg'] = 'Deslogado com sucesso';
    header("Location:../index.php");