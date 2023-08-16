<?php

    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['logado']) || $_SESSION['logado']!==1)
    {
        header("Location:index.php");
    }

    include "conexao.php";
        
    $sql = $conexao->prepare("SELECT * FROM serie WHERE cod_serie = ?");
    $sql->execute();
    $resultado = $sql->get_result();
    //$aux=0;
            
    $serietop = $resultado->prepare("INSERT INTO visualiza (cod_serie, cod_usuario) VALUES ('?', $_SESSION)") 
    
?>


<!--Script-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

   