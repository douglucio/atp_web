<?php
    session_start(); 
    require '../../config/connect.php';  
    
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($mysqli, $_POST['email']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
        $senha = md5($senha);
            
        $result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($mysqli, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['perfil'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
                
            header("Location: ../../admin/painel.php");
            
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            //header("Location: index.php");
            echo $_SESSION['loginErro'];
        }
    }else{
        $_SESSION['loginErro'] = "n Usuário ou senha inválido";
        //header("Location: index.php");
        echo $_SESSION['loginErro'];
    }
?>