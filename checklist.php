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

      <li><a href="selecionar-serie.php" class="waves-effect waves-light btn verde-azulado col l12">
      <i class="material-icons right" style="color:white">check_box</i> Checklist</a></li>

    </ul>

    <!-- Layout -->
    <div class="row">

      <!-- Sidenav - Perfil -->
      <br>
      <div class="col l2 hide-on-med-and-down" style="background-color:white">
      <br>
      <div class="card">
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

      <div class="col s12 m12 l10" id="checklist">

        <div class="container">
          <div class="section"></div>
          <br>

          <?php

            $serie = $_GET['id'];
            $titulo_serie = $_GET['titulo'];

            $sql = $conexao->prepare("SELECT COUNT(*) as temporadas FROM temporada WHERE cod_serie = ?");
            $sql->bind_param("i",$serie);

            $sql->execute();
            $resultado = $sql->get_result();

            while($linha = $resultado->fetch_array()){

            $num_temp = $linha['temporadas'];
            $temps = 1;
            $temporada = $temps;

            echo'
            <br>

            <h1>'.$titulo_serie.'</h1>

            <br>

            <center>
            <div class="input-field">
            <form action="checklist-inside.php" method="POST">
              <select id="option" name="option">
              <option value="" disabled selected>Escolha uma Temporada</option>
            ';

            do {
              if($temps==1){
                  echo '<option value="1">Temporada 1</option>';
                  
                  $temps++;
              }
             
          
              else{
                  echo '<option value="'.$temps.'">Temporada '.$temps.' </option>';
          
                  $temps++;
              }
          
          } while ($temps<=$num_temp);

          }

          echo '
            </select>
            <br>
            <button class="right btn verde-azulado">Selecionar</button>
          </form>
          
          ';
          ?>
          
          </div>
      
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() 
      {
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