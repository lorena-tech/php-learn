<?php
    session_start();
    include_once("conexao.php");

    if (isset($_SESSION['logado']))
    {
        session_destroy();
        header("Location: index.php");
    }

    else
    {
        header("Location: index.php");
    }
?>