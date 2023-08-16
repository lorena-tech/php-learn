<?php

	$bdservidor='127.0.0.1';
	$bdusuario='root';
	$bdsenha='';
	$bdbanco='cactvs_bd';

	$conexao = new mysqli ($bdservidor,$bdusuario,$bdsenha,$bdbanco);

	$sql="SET NAMES 'utf8'";
	mysqli_query($conexao,$sql);
	$sql='SET character_set_connection=utf8';
	mysqli_query($conexao,$sql);
	$sql='SET character_set_client=utf8';
	mysqli_query($conexao,$sql);
	$sql='SET character_set_results=utf8';

	if (mysqli_connect_errno($conexao))
	{
		//se der erro
		die ('Houve o seguinte erro:'.mysqli_connect_errno());
		exit();
	}

?>