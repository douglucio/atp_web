<?php
 session_start();

 if (!isset($_SESSION['usuarioId'])) header("Location: ../index.php");
    exit; // Encerra a execução do script

 echo "Logado como ".$_SESSION['usuarioNome'];
 echo "<br><a href='../views/usuarios/deslogar.php'>Sair</a>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Painel Admin</h1>
</body>
</html>