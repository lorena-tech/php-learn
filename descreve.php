<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Google Icones - Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Importando css e scss-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="scss/materialize.scss" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon/">

    <!--Otimizado para mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Cactvs</title>
  </head>
  <body>

    <!--Conexão com o banco-->
    <?php

      session_start();
      include_once("conexao.php");

      if(!isset($_SESSION['logado']) || $_SESSION['logado']!==1)
      {
        header("Location:index.php");
      }

    ?>

    <!-- Navbar-->
    <nav class="black hide-on-med-and-down">
      <div class="nav-wrapper container">
        <a href="home.php" class="brand-logo right">CACTVS</a>
      </div>
    </nav>

    <!--Navbar Mobile-->
    <nav class="black show-on-med-and-down hide-on-large-only">
      <div class="nav-wrapper container">
        <a href="#" data-target="slide-out" class="sidenav-trigger" style="color:white"><i class="material-icons">menu</i></a>
        <a href="home.php" class="brand-logo right">CACTVS</a>
      </div>
    </nav>

    <ul id="slide-out" class="sidenav">
    
      <li><div class="user-view">
        <a href="#"><img class="responsive-image circle" src="img/perfil/<?php echo $_SESSION['foto']?>"></a>
        <a href="#"><span class="black-text name"><?php echo $_SESSION['nome'] ?></span></a>
      </div></li>

      <li><div class="divider"></div></li>

      <li><a href="home.php" class="waves-effect waves-light btn verde-azulado col l12">
      <i class="material-icons right" style="color:white">home</i> Página Inicial</a></li>

      <li><a href="favoritos.php" class="waves-effect waves-light btn verde-azulado col l12">
      <i class="material-icons right" style="color:white">favorite</i> Favoritos</a></li>

      <li><a href="lembrete.php" class="waves-effect waves-light btn verde-azulado col l12">
      <i class="material-icons right" style="color:white">notifications</i> Lembretes</a></li>

      <li><a href="" class="waves-effect waves-light btn verde-azulado col l12">
      <i class="material-icons right" style="color:white">check_box</i> Checklist</a></li>

    </ul>

    <!-- Layout -->
    <div class="row">

      <!-- Sidenav - Perfil -->
      <br>
      <div class="col l2 hide-on-med-and-down" style="background-color:white" id="sidebar_desk">
      <br><div class="card">
        <div class="card-image">
        <img src="img/perfil/<?php echo $_SESSION['foto']?>">
          
          <a class="btn-floating halfway-fab waves-effect waves-light verde-azulado" href="perfil.php"><i class="Tiny material-icons">mode_edit</i></a>
        </div>
        <div class="card-content">
          <center><b><?php echo $_SESSION['nome'] ?></b></center><hr>
              <center>"Bom dia, amantes da sétima arte de todo o Brasil!"</center>
        </div>
        <div class="card-action">
        </div>
      </div>

              <div class="row center">
                <a href="home.php" class="waves-effect waves-light btn verde-azulado col l12">
                <i class="material-icons right">home</i> Página Inicial</a>
              </div>

              <div class="row center">
                <a href="favoritos.php" class="waves-effect waves-light btn verde-azulado col l12">
                <i class="material-icons right">favorite</i> Favoritos</a>
              </div>

              <div class="row center">
                <a href="lembrete.php" class="waves-effect waves-light btn verde-azulado col l12">
                <i class="material-icons right">notifications</i> Lembretes</a>
              </div>

              <div class="row center">
                <a href="selecionar-serie.php" class="waves-effect waves-light btn verde-azulado col l12">
                <i class="material-icons right">check_box</i> Checklist</a>
              </div>

              <div class="row center">
                <a href="logout.php" class="waves-effect waves-light btn white col l12" style="color:black">
                <i class="material-icons right">input</i> Sair</a>
              </div>
        </div>

        <div class="col s12 m12 l10" id="conteudo">

              <div class="container">

                  <div class="section"></div>

                  <?php
      include "conexao.php";
          $idLegal = $_GET['id'];
          $tipolegal = $_GET['tipo'];
          //echo $idLegal, $tipolegal;

          switch($tipolegal){
              case 0:
                  $sql = $conexao->prepare("select * from filme where cod_filme = ?");
                  $sql->bind_param("i",$idLegal);
          
                  $sql->execute();
                  $resultado = $sql->get_result();
                  while($linha = $resultado->fetch_assoc()){

                    $_SESSION['filme'] = $linha['cod_filme'];

                      echo'

                      <a style="color:black" href="home.php">
                          <i class="material-icons left" style="color:black">arrow_back</i>
                      </a>

                          <div class="row">

                              <h1>'.$linha['titulo'].'</h1>

                              <div class="col l6 s12">
                                  <p><b>Ano: </b>'.$linha['ano'].'</p>
                                  <p><b>Sinopse: </b>'.$linha['sinopse'].'</p>
                                  <p><b>Gênero: </b>'.$linha['genero'].'</p>
                                  <p><b>Idioma: </b>'.$linha['idioma'].'</p>
                                  <p><b>Diretor: </b>'.$linha['diretor'].'</p>
                              </div>

                              <div class="col l6 s12">
                                  <p><b>Produtora: </b>'.$linha['produtora'].'</p>
                                  <p><b>Ator: </b>'.$linha['ator'].'</p>
                                  <p><b>Prêmio: </b>'.$linha['premio'].'</p>
                                  <p><b>Classificação: </b>'.$linha['classificacao'].'</p>
                                  <p><b>Avaliação: </b>'.$linha['nota'].'</p>
                                  <p><b>Onde Assistir: </b>'.$linha['onde_assistir'].'</p>
                                  <br>
                                  <hr>
                                  <p>
                                  <form method="POST" action="favoritar.php">
                                    <input type="hidden" '.$_SESSION['usuario'].' />
                                    <button class="right btn verde-azulado">Adicionar aos Favoritos</button>
                                  </form>                      
                              </div>
                          
                          
                          </div>                       

                      
                      ';
                  }
                  break;
              case 1:
                  $sql = $conexao->prepare("select * from serie where cod_serie = ?");
                  $sql->bind_param("i",$idLegal);
          
                  $sql->execute();
                  $resultado = $sql->get_result();
                  while($linha = $resultado->fetch_assoc()){

                    $_SESSION['serie'] = $linha['cod_serie'];

                      echo'
                      <a style="color:black" href="home.php">
                          <i class="material-icons left" style="color:black">arrow_back</i>
                      </a>
          
                          <div class="row">

                              <h1>'.$linha['titulo'].'</h1>

                              <div class="col l6 s12">
                                  <p><b>Ano: </b>'.$linha['ano'].'</p>
                                  <p><b>Sinopse: </b>'.$linha['sinopse'].'</p>
                                  <p><b>Gênero: </b>'.$linha['genero'].'</p>
                                  <p><b>Idioma: </b>'.$linha['idioma'].'</p>
                                  <p><b>Criador: </b>'.$linha['criador'].'</p>
                              </div>

                              <div class="col l6 s12">
                                  <p><b>Produtora: </b>'.$linha['produtora'].'</p>
                                  <p><b>Ator: </b>'.$linha['ator'].'</p>
                                  <p><b>Prêmio: </b>'.$linha['premio'].'</p>
                                  <p><b>Classificação: </b>'.$linha['classificacao'].'</p>
                                  <p><b>Avaliação: </b>'.$linha['nota'].'</p>
                                  <p><b>Onde Assistir: </b>'.$linha['onde_assistir'].'</p>
                                  <br>
                                  <hr>
                                  <p>
                                  <form method="POST" action="selecao-series.php">
                                    <input type="hidden" '.$_SESSION['usuario'].' />
                                    <button class="right btn verde-azulado">Adicionar aos Favoritos</button>
                                  </form>
                              </div>
                      
                      
                          </div>
                      
                      ';
                  }
                  break;
          }
      ?>


              </div>

              </div>

          </div>

      </div>


    <!--Script-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>