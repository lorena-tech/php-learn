<?php

    session_start();
    include_once("conexao.php");

    $nome = mysqli_real_escape_string($conexao, $_POST['enome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['esenha']);
    $foto = mysqli_real_escape_string($conexao, $_POST['efoto']);
    $email = mysqli_real_escape_string($conexao, $_POST['eemail']);

    $sql = "UPDATE usuario SET nome='$nome', senha ='$senha', foto='$foto' WHERE email='$email'";

    $result = mysqli_query($conexao, $sql);

    $resultt = mysqli_fetch_assoc($result);

    if (!empty($resultt)) 
    {
        $_SESSION['nome'] = $resultt['nome'];
        $_SESSION['foto'] = $resultt['foto'];
        $_SESSION['senha'] = $resultt['senha'];
        echo"<script type='text/javascript'>alert('A-tu-a-li-zooou');
        
        window.location.href='perfil.php';
        
        </script>";
        

    }

    else
    {
        echo"<script type='text/javascript'>alert('Oh, minha vida, tenta de novo');

        //window.location.href='perfil.php';

        </script>";  
    }

?>