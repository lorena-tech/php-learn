<?php
session_start();
include_once("conexao.php");

include "conexao.php";
$cod_filme = $_SESSION['filme'];
$cod_usuario = $_SESSION['usuario'];

$sql = ("insert into filmes_favoritados (cod_usuario,cod_filme,ativo) values ('".$cod_usuario."','".$cod_filme."','1')");
$result = mysqli_query($conexao, $sql);

if(!empty($result)){

    echo"<script type='text/javascript'>alert('Filme favoritado com sucesso');window.location.href='favoritos.php';</script>";
    $_SESSION['logado']=1;
    exit;
}


?>