<?php

    session_start();
    include_once("conexao.php");

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $foto = 'sem foto.jpg';
    $ativo = '1';

    $sql = "INSERT INTO usuario (nome, email, senha, foto, ativo) VALUES ('$nome', '$email', '$senha', '$foto', '$ativo')";

    $result = mysqli_query($conexao, $sql);

    $resultt = mysqli_fetch_assoc($result);

    if (!empty($resultt)) 
    {
        echo"<script type='text/javascript'>alert('Erro ao Cadastrar');window.location.href='index.php';</script>";
        //header("Location: index.php?#modal2");
        exit;
    }

    else
    {
    //header("Location: index.php?#modal1");
    echo"<script type='text/javascript'>alert('Cadastro com sucesso');window.location.href='index.php';</script>";
    //$_SESSION['ErroLogin'] = "Email ou Senha invalidos";    
    exit;     
    }
        
?>