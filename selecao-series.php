<?php
session_start();
include_once("conexao.php");

include "conexao.php";
$cod_serie = $_SESSION['serie'];
$cod_usuario = $_SESSION['usuario'];

$sql = ("insert into visualiza (cod_usuario,cod_serie,ativo) values ('".$cod_usuario."','".$cod_serie."','1')");
$result = mysqli_query($conexao, $sql);

if(!empty($result)){

    echo"<script type='text/javascript'>alert('Série favoritada, anjo sz');window.location.href='selecionar-serie.php';</script>";
    $_SESSION['logado']=1;
    exit;
}


?>