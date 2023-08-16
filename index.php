<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cactvs</title>

      <!--Google Icones - Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Importando css e scss-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="scss/materialize.scss" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
      <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon/">
  </head>
  <body class="black">

  <?php

      session_start();
      include_once("conexao.php");
      if(isset($_SESSION['logado']) && $_SESSION['logado']==1){
        header("Location:home.php");
      }

  ?>

  <!--Modal Cadastro-->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h5>Cadastre-se</h5>
      <div class="row">

          <form class="col s12" action="cadastrar.php" method="POST">

            <div class="row">
              <div class="input-field col s12">
                <input name="nome" type="text" class="validate">
                <label for="Apelido">Apelido</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col l7 s12">
                <input name="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>

              <div class="input-field col l5 s12">
                <input name="senha" type="password" class="validate">
                <label for="senha">Senha</label>
              </div>
            </div>

            <input type="submit" class="waves-effect waves-teal btn verde-azulado text-white" id="cadastrar" value="Cadastrar">
          </form>

      </div>
    </div>
  </div>

  <!--Modal Login-->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h5>Login</h5>
      <div class="row">

        <form class="col s12" action="logar.php" method="POST">

          <div class="row">
            <div class="input-field col l12 s12">
              <input id="email_l" name="email_l" type="email" class="validate">
              <label for="email_l">Email</label>
            </div>

            <div class="input-field col l12 s12">
              <input id="senha_l" name="senha_l" type="password" class="validate">
              <label for="senha_l">Senha</label>
            </div>
          </div>

          <input type="submit" class="waves-effect waves-teal btn verde-azulado text-white" id="enter" value="Entrar">
        </form>
        
      </div>
    </div>
  </div>

  <!--Site Corpo-->
  <nav class="black" role="navigation">
      <div class="nav-wrapper container">
        <ul class="right hide-on-med-and-down">
          <li><a class="btn waves-btn verde-azulado modal-trigger" href="#modal2">Login</a></li>
        </ul>
      </div>
  </nav>
  
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center white-text">CACTVS</h1>
        <div class="row center">
          <h5 class="header col s12 light white-text">Controle de Atividades Cinematográficas e Televisivas</h5>
        </div>
        <div class="row center">
          <a href="#modal1" id="download-button" class="btn-large waves-effect waves-light verde-azulado lighten-1 modal-trigger">Cadastre-se</a>
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="img/fundo.jpeg"></div>
    </div>

     <!--Icones-->
    <div class="container">
      <div class="section">
        <div class="row">

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="medium material-icons">devices</i></h2>
              <h5 class="center white-text">Facilidade</h5>
              <p class="white-text">Não deixe o atraso te engolir, a gente te ajuda a combater esse monstro! Com o CACTVS você pode finalmente assistir suas séries e filmes em paz. Aqui você tem seu próprio planner digital e acompanha o lançamento de séries e filmes baseados nos seus interesses. Ser maluco por FRIENDS, GREY'S, TWD, GOT e PLL nunca foi tão fácil.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="medium material-icons">group</i></h2>
              <h5 class="center white-text">Favoritinhos</h5>
              <p class="white-text">Toda vez que você pensa em assistir um filme, fica HORAS procurando um? Seus problemas acabaram. Aqui você salva sua lista de filmes amados e séries queridas. Daí, a partir dos favoritos, a gente pode te recomendar umas coisas pra assistir. E no date de pipoca e filme, você pode escolher e assistir tudo bem mais rápido.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="medium material-icons">error_outline</i></h2>
              <h5 class="center white-text">Falta de aviso não foi</h5>
              <p class="white-text">Não acredito que você acumulou séries e matéria mais uma vez. Criar lembretes é a forma mais fácil de lembrar e adivinha quem tem uma função disso? Anran, o CACTVS. Além dessa função a gente tem um checklist pra você não se perder. Só corre pro edredom, pega a pipoca e MARATONA.</p>
            </div>
          </div>

        </div>
      </div>
    </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 white-text" style="margin-left:100%">Suas séries organizadas de um jeito que você nunca viu, bebê.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/fundo.jpeg"></div>
  </div>

  <footer class="page-footer black">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">Sobre Nós</h5>
          <p class="grey-text text-lighten-4">Somos uma equipe de estudantes do ensino técnico trabalhando neste projeto como se fosse nossa missão de vida em tempo integral. Utilizando conceitos como reaproveitamento de código, mobile first e outros, buscamos transmitir ao usuário total comodidade e organização.  </p>


        </div>
        <div class="col l5 s12">
          <h5 class="white-text">Nós, porém fora daqui</h5>
          <ul>
            <li><a class="white-text" href="#!">Facebook</a></li>
            <li><a class="white-text" href="#!">Twitter</a></li>

          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contato </h5>
          <ul>
            <li><h6 class="white-text" href="#!">Me ajuda, CACTVS!!1!!1</a></li>
            <li><a class="white-text" href="#!">Seu pedido é uma ordem!</a></li>
            <li><a class="white-text" href="#!">Quer entrar em contato com a gente? Nos chame no privado.</a></li>
            <li><a class="white-text" href="#!">projetocactvs@gmail.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });
    </script>
    
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>