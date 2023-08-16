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
      <div class="col l2 hide-on-med-and-down" style="background-color:white" id="sidebar_desk"><br>
        <div class="card">
          <div class="card-image">
            <img src="img/perfil/<?php echo $_SESSION['foto']?>">
            <a class="btn-floating halfway-fab waves-effect waves-light verde-azulado" href="perfil.php"><i class="Tiny material-icons">mode_edit</i></a>
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

      <div class="col s12 m12 l10" id="conteudo">
        <div class="container">
          <div class="section"></div>
            
            <h1>Editar Perfil</h1>
            <hr><br>

              <div class="row">
                <form class="col s12" action="atualizar.php" method="POST">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix ">account_circle</i>
                      <input id="enome" type="text" name="enome" class="validate" value="<?php echo $_SESSION['nome'] ?>">
                      <input type="hidden" name="eemail" value="<?php echo $_SESSION['email'] ?>">
                      <label for="enome">Editar Apelido</label>
                    </div>
                    <div class="input-field col l12">
                      <i class="material-icons prefix">lock_outline</i>
                      <input id="esenha" name="esenha" type="password" class="validate" value="<?php echo $_SESSION['senha'] ?>">
                      <label for="esenha">Nova Senha</label>
                    </div>
                    <div class="file-field input-field col s12">
                      <div class="waves-effect waves-light btn verde-azulado">
                      <i class="material-icons">camera_alt</i>
                      <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input id="efoto" class="file-path" name="efoto" type="text" value="<?php echo $_SESSION['foto'] ?>">
                    </div>
                    <br><br>
                    <input type="hidden" <?php $_SESSION['usuario'] ?> />
                   <button class="right btn verde-azulado"><i class="material-icons right">send</i>Enviar</button>
                  </div>
                </form>
              </div>         
            </div>  
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