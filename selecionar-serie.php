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
        <a href="#"><img class="responsive-image circle" src="img/perfil/maurilio.jpg"></a>
        <a href="#"><span class="black-text name"><?php echo $_SESSION['nome'] ?> </span></a>
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
    <div class ="row center-align">
                  
      <!-- Sidenav - Perfil -->
      <br>

      <div class="col l2 hide-on-med-and-down" style="background-color:white" id="sidebar_desk"><br>
        <div class="card">
          <div class="card-image">
            <img src="img/perfil/<?php echo $_SESSION['foto']?>">
              <a class="btn-floating halfway-fab waves-effect waves-light verde-azulado" href="perfil.php"><i class="Tiny material-icons">mode_edit</i></a>
          </div>
          <div class="card-content">
            <center><b> <?php echo $_SESSION['nome'] ?> </b></center><hr>
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

      <div class="row align-center">
        <div class="col s12 offset-s1">

          <div class="container">
          <center><h3> Minhas Séries </h3></center><hr><br>


            <div class="card-deck">
                      
            <!--Adicionar série, abre modal de seleção-->
            <a class="modal-trigger" href="#addserie"><img class="capa" src="img/banner+.png"></a>
            <div id="addserie" class="modal modal-fixed-footer">

            <!--Modal Content - Inicio -->
            <div class="modal-content">
              <h4 class="center">Adicione sua nova série do momento</h4>
              <hr>
              <br>

              <!-- conexão com o banco para exibir séries ativas para add-->
              <?php
                
                $sql = $conexao->prepare("SELECT * from serie WHERE ativo=1");
                $sql->execute();
                $resultado = $sql->get_result();
              
                //botão c foto dentro

                while($linha = $resultado->fetch_assoc())
                {
                  echo'
            
                      <id='.$linha['cod_serie'].'&tipo=1" class="card_img l3">
                        <img class="capa" src="img/series/'.$linha['foto'].'">
                      </a>
                  
                  ';
                }
              ?>      
            </div>

            <!--Modal Content - Final -->
              
              <div class="modal-footer">
                <a href="selecao-serie.php" class="modal-close waves-effect waves-green btn-flat">Adicionar</a> 
                <a href="#!" class="modal-close waves-effect waves-red btn-flat">X</a> 
              </div>
            </div>
            <!--Modal - Final e fim do card deck -->
    
            <!--JQuery inicialização do modal-->
            <script>
              document.addEventListener('DOMContentLoaded', function() 
              {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems);
              });
            </script>


            <?php
                    
            $sql = $conexao->prepare("SELECT s.foto, s.titulo, s.cod_serie , v.cod_usuario FROM serie AS s INNER JOIN visualiza AS v ON v.cod_serie = s.cod_serie WHERE v.ativo=1");
            $sql->execute();
            $resultado = $sql->get_result();
            while($linha = $resultado->fetch_assoc()){
              
              $_SESSION['cod_serie'] = $linha['cod_serie'];
              $cod_usuario = $linha['cod_usuario'];
              $usu = $_SESSION['usuario'];

              if($cod_usuario==$usu){
              echo'

                  <a href="checklist.php?id='.$linha['cod_serie'].'&titulo='.$linha['titulo'].'"><img class="capa" src="img/series/'.$linha['foto'].'"></a>

                ';

            }
          }
            ?>

          </div>
        </div>
      </div>       

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });
    </script>

    <!--Script-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>