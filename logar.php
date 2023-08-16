<?php 
    session_start();
    include_once("conexao.php");
    //$_SESSION['logado']=1;

    // echo "teste desgraçado";
    // die();

    //if ((!empty($_POST)) && (!empty($_POST['email_l'])) && (!empty($_POST['senha_l']))) {
        
        $senha = mysqli_real_escape_string($conexao, $_POST['senha_l']);
        $email = mysqli_real_escape_string($conexao, $_POST['email_l']);

        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' AND ativo = 1 LIMIT 1";

        $result = mysqli_query($conexao, $sql);

        $resultt = mysqli_fetch_assoc($result);

        if (!empty($resultt)) 
        {
            $_SESSION['nome'] = $resultt['nome'];
            $_SESSION['sobrenome'] = $resultt['sobrenome'];
            $_SESSION['foto'] = $resultt['foto'];
            $_SESSION['senha'] = $resultt['senha'];
            $_SESSION['email'] = $resultt['email'];
            $_SESSION['usuario'] = $resultt['cod_usuario'];
            header("Location: home.php");
            $_SESSION['logado']=1;
        }

        else
        {
            echo"<script type='text/javascript'>alert('Erro ao Logar');window.location.href='index.php';</script>";
            //header("Location: index.php");
            die();
            //$_SESSION['ErroLogin'] = "Email ou Senha invalidos";           
        }
 
    //}
?>