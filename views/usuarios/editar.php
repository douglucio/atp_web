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

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id = $id;");
$total = mysqli_num_rows($result); 


if ($total > 0) {
    
    foreach ($result as $value) {
        $id = $value['id'];
        $nome = $value['nome'];
        $email = $value['email'];
        $perfil = $value['perfil'];
    }

   
    
    echo "<div class='container'>";
    echo "<h1 class='text-center mt-5' >Editar Cadastro de Usuarios</h1>";
    echo "<form class='mt-5' action='alterar_us.php?id=$id' method='post'>";
    echo "<div class='mb-3'>";
    echo "<label for='id_us' class='form-label'>Id</label>";
    echo "<input type='email' class='form-control' id='id_us' name='id_us' value='$id' disabled>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='nome_us' class='form-label'>Nome do Usuário</label>";
    echo "<input type='text' class='form-control' id='nome_us' name='nome_us' value='$nome'>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='email_us' class='form-label'>Email</label>";
    echo "<input type='email' class='form-control' id='email_us' name='email_us' value='$email' disabled>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='senha_us' class='form-label'>Senha</label>";
    echo "<input type='password' class='form-control' id='senha_us' name='senha_us' required>";
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='perfil_us' class='form-label'>Perfil</label>";
    echo "<input type='text' class='form-control' id='perfil_us' name='perfil_us' value='$perfil' disabled>";
    echo "</div>";
    
    echo "<button type='submit' class='btn btn-primary btn-lg form-control'>Editar Cadastro</button>";
    echo "</form>";
    echo "</div>";

    

} else {
    echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
    echo "<div class='col-auto card p-5 text-center'>";
    echo "<div class='card-header'>";
    echo "<i class='material-icons' style='color:red; align: center;'>error</i>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Usuário não encontrado</h5>";
    echo "Error: 593 - ID ".$id." não encontrado<br>" ;
    echo "<br><a href='consulta.php' class='btn btn-primary'>Ir para listagem</a>";
    echo "</div>";
    echo "<div class='card-footer text-muted'>";
    echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
    echo "</div>";
    echo "</div>";
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 