
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Usuário</title>
</head>
<body>
<?php

require "../../config/connect.php";

$nome  = $_POST['nome_us'];
$email = $_POST['email_us'];
$senha = md5($_POST['senha_us']);


$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if (mysqli_query($mysqli, $sql)) {
    echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
    echo "<div class='col-auto card p-5 text-center'>";
    echo "<div class='card-header'>";
    echo "<i class='material-icons' style='color:green; align: center;'>check_circle</i>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Usuário cadastrado com sucesso!</h5>";
    echo "<p class='card-text'>".$email."</p>";
    echo "<a href='../../index.php' class='btn btn-primary'>Ir para login</a>";
    echo "</div>";
    echo "<div class='card-footer text-muted'>";
    echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
    echo "</div>";
    echo "</div>";
} else {
    
    echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
    echo "<div class='col-auto card p-5 text-center'>";
    echo "<div class='card-header'>";
    echo "<i class='material-icons' style='color:green; align: center;'>error</i>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Usuário cadastrado com sucesso!</h5>";
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    echo "<a href='../../index.php' class='btn btn-primary'>Ir para login</a>";
    echo "</div>";
    echo "<div class='card-footer text-muted'>";
    echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
    echo "</div>";
    echo "</div>";
}

mysqli_close($mysqli);


?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>