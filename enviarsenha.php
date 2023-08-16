<?php

    include 'conexao.php';
    session_start();

    if (empty($_POST)) 
    {
        header('Location: index.php');
        exit();
    }

    require_once 'phpmailer/src/PHPMailer.php';
    require_once 'phpmailer/src/SMTP.php';
    require_once 'phpmailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $email = $_POST['email'];

    if (empty($email))
    {
        echo "ErroEmail";
        die();
    }

    $sql = $conexao->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
    $sql->bind_param("s", $email);

    $sql->execute();

    $resultado = $sql->get_result();
    $linha = $resultado->fetch_assoc();

    if (empty($linha)) 
    {
        echo 'ErroUsuario';
        die();
    }

    else 
    {

        $msn = "<html>Olá ".$linha['nome']."<br><br>";
        $msn .= "Cabeça de vento! Esqueceu a senha, né?.<br><br>";
        $msn .= "Entra usando isso aqui que vai dar bom:<br>";
        $msn .= "E-mail: ".$linha['email'].";<br>";
        $msn .= "Senha: ".$linha['senha'].".</html>";

        $msn1 = "Olá ".$linha['nome']."\n\n";
        $msn1 .= "Cabeça de vento! Esqueceu a senha, né?.\n\n";
        $msn1 .= "Entra usando isso aqui que vai dar bom:\n";
        $msn1 .= "E-mail: ".$linha['email'].";\n";
        $msn1 .= "Senha: ".$linha['senha'].";\n";

        $username = 'cactvsprojeto@gmail.com';
        $password = '#cactvs2019';
        $assunto = 'REDEFINIÇÃO DE SENHA';

        $mail = new PHPMailer(true);
        //Server settings
        $mail->Charset = "UTF-8";
        $mail->Debugoutput = 'html';
        $mail->setLanguage('pt');              
        $mail->isSMTP();                               
        $mail->Host = 'smtp.gmail.com';  
        //$mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;             
        $mail->Username = $username;
        $mail->Password = $password;     
        
        $mail->SMTPSecure = 'ssl';               
        $mail->Port = 465;  

        $mail->setFrom($username);
        $mail->addAddress($email);  
        $mail->Subject = $assunto;
        $mail->msgHTML(utf8_decode($msn));
        $mail->AltBody = utf8_decode($msn1);

        if(!$mail->send()) 
        {
            echo 'ErroEnvio';
            //echo 'Erro: ' . $mail->ErrorInfo;
        } 
        
        else 
        {
            echo "Sucesso";
        }
    }

    $sql->close();
    $conn->close();

    exit();

?>