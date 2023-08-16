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

    <?php
      include_once("conexao.php");
      session_start();
      
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
      <div class="col l2 hide-on-med-and-down" style="background-color:white" id="sidebar_desk"><br>
        <div class="card">
          <div class="card-image">
            <img src="img/perfil/<?php echo $_SESSION['foto']?>">
            <a class="btn-floating halfway-fab waves-effect waves-light verde-azulado"><i class="Tiny material-icons">mode_edit</i></a>
          </div>
          
          <div class="card-content">
            <center><b><?php echo $_SESSION['nome'] ?></b></center><hr>
            <center>"Bom dia, amantes da sétima arte de todo o Brasil!"</center>
          </div>
          
          <div class="card-action"></div>
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

      <div class="col s12 offset-s2" id="corpo">

        <!--Criar lembretes-->
        <div class="col l4 s12">
          <div class="section"></div>
          <div class="container">
            <h4 class="center">Criar Novo Lembrete</h4>

            <form action="php/back.php" method="POST">
              <div class="input-field s12">
                <input id="lembrete" name="lembrete" type="text" onkeypress="mascaraData(this)">
                <label for="lembrete">Nome do lembrete</label>
              </div>

              <div class="input-field s12">
                <input class="datepicker" id="data" name="data" type="date" placeholder="dd/mm/aaaa">
                <label for="data">Data do lembrete</label>
              </div>

              <div class="input-field s12">          
                <input class="timepicker" id="hora" name="hora" type="time" placeholder="00:00">
                <label for="hora">Hora do lembrete</label>
              </div>

              <div class="input-field s12">
                <button type="submit" id="criar-lembrete" name="criar-lembrete" class="btn black right">
                  <i class="large material-icons">add</i>
                </button>
              </div>

            </form>

          </div><br><br><br>

          <div id="erro" class="container vermelhinho light-text white-text center"></div>  
        </div>

        <!--Lembretes Pendentes-->
        <div class="col l4 s12">
          <div class="section"></div>

          <div class="container">
            <div class="center">
            <h4><i class="center" aria-hidden="true"></i>Lembretes Pendentes</h4>
          </div>

          <div id="recordatorios"><br>
          
            <?php

              if(isset($_SESSION['lista']))
              {
                $n = 0;
                while($n < $_SESSION['n'])
                {
                  echo '<div class="container-lembrete">
                  
                  <div class="container-lembrete-interno">
                    <h5 class="center"> '. $_SESSION['lista'][$n]['mensagem']. ' </h3>
                    <p class="center"> ' .$_SESSION['lista'][$n]['dia']. '</h4>
                    <p class="center"> ' .$_SESSION['lista'][$n]['hora']. '</h4>
                  </div>';
                  $n++;
                }
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
    <script src="js/main.js"></script>

  </body>
</html>