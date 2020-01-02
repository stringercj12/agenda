<?php

    require_once('bdd.php');

    if($_POST['dele'] && $_POST['dele'] == "all"){
            $sql = "DELETE FROM events"; 
            $query = $bdd -> prepare($sql); 
            $res = $query -> execute();

        header("Location: listaeventos.php");

    }else if($_GET['url_del']){

        $sql = "DELETE FROM events WHERE id = ?"; 
        $query = $bdd -> prepare($sql);
        $query->bindValue(1, $_GET['url_del']);
        $res = $query -> execute();
        
        header("Location: listaeventos.php");
    }else{
        echo "Erro ao exlcuir";
    }