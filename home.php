<!DOCTYPE html>
<html lang="en">
  <head>
    <!--Google Icones - Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Importando css e scss-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="scss/materialize.scss" media="screen,projection"/>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon/">
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>

    <!--Otimizado para mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Cactvs</title>
  </head>
  <body>

    <!--Conexão com o bando e sessão logado-->
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

      <li><a href="selecionar-serie.php" class="waves-effect waves-light btn verde-azulado col l12">
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
              <a class="btn-floating halfway-fab waves-effect waves-light verde-azulado" href="perfil.php?"><i class="Tiny material-icons">mode_edit</i></a>
            </div>
            <div class="card-content">
              <center><b> <?php echo $_SESSION['nome'] ?> </b></center><hr>
              <center>"Bom dia, amantes da sétima arte de todo o Brasil!"</center>
            </div>
          <div class="card-action">
          </div>   
        
      </div>

          <!--Modal Perfil-->

          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Modal Header</h4>
              <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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
      <div class="col s12 offset-s1" id="conteudo">

      <!--Pedir ajuda pro Marcelo-->
      <div class="container">

          <!--Busca Filmes-->
          <div><h3>Filmes</h3><hr><br></div>
          <div class="row">

            <?php
              
              $sql = $conexao->prepare("select * from filme WHERE ativo=1");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_filme'].'&tipo=0" class="card_img l3">
                  <img class="capa" src="img/filmes/'.$linha['foto'].'">
                  </a>
                  ';
              }
            ?>

          </div>
          <br>

          <!--Busca Filmes de 2019-->
          <div><h3>Os Filmes Novinhos</h3><hr><br></div>
          <div class="row">

            <?php
              
              $sql = $conexao->prepare("select * from filme WHERE ativo=1 AND ano='2019'");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_filme'].'&tipo=0" class="card_img l3">
                  <img class="capa" src="img/filmes/'.$linha['foto'].'">
                  </a>
                  ';
              }

            ?>

          </div>
          <br>

          <!--Busca Filmes + 90%-->
          <div><h3>Filmes de Cult</h3><hr><br></div>
          <div class="row">

            <?php
              
              $sql = $conexao->prepare("select * from filme WHERE ativo=1 AND nota>='90%'");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_filme'].'&tipo=0" class="card_img l3">
                  <img class="capa" src="img/filmes/'.$linha['foto'].'">
                  </a>
                  ';
              }
            ?>

          </div>
          <br>
          <!--Busca Séries-->
          <div id="series"><h3>Séries</h3><hr><br></div>
          <div class="row">

            <?php
              $sql = $conexao->prepare("select * from serie WHERE ativo=1");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_serie'].'&tipo=1" class="card_img l3">
                  <img class="capa" src="img/series/'.$linha['foto'].'">
                  </a>
                  ';
              }
            ?>

          </div>
          <br>
          <!--Busca Séries +90%-->
          <div id="series"><h3>Series de Cult</h3><hr><br></div>
          <div class="row">

            <?php
              $sql = $conexao->prepare("select * from serie WHERE ativo=1 AND nota>='90%'");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_serie'].'&tipo=1" class="card_img l3">
                  <img class="capa" src="img/series/'.$linha['foto'].'">
                  </a>
                  ';
              }
            ?>

          </div>
          <br>

          <!--Busca Séries +2019-->
          <div id="series"><h3>As Séries Novinhas</h3><hr><br></div>
          <div class="row">

            <?php
              $sql = $conexao->prepare("select * from serie WHERE ativo=1 AND ano='2019'");
              $sql->execute();
              $resultado = $sql->get_result();

              while($linha = $resultado->fetch_assoc())
              {
                echo'
                  <a href="descreve.php?id='.$linha['cod_serie'].'&tipo=1" class="card_img l3">
                  <img class="capa" src="img/series/'.$linha['foto'].'">
                  </a>
                  ';
              }
            ?>

          </div>
          <br>

        </div>
      </div>
    </div>

    <!--Script-->
    <script scr="js/carrossel.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>