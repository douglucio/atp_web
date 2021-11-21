
 <?php
    session_start();
    
    if (!isset($_SESSION['usuarioId']) ) header("Location: ../index.php");

    ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Item</title>
</head>
<body>
<?php

require "../../config/connect.php";

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM itens WHERE id_iten = $id;");
$total = mysqli_num_rows($result); 


if ($total > 0) {
    
    foreach ($result as $value) {
        $id = $value['id_iten'];
        $nome = $value['nome_iten'];
        $desc = $value['desc_iten'];
        $img = $value['img_iten'];
        $cod_us = $value['cod_usuario'];
    }

   
    
    echo "<div class='container'>";
    echo "<h1 class='text-center mt-5' >Editar Cadastro de Item</h1>";
    echo "<form class='mt-5' action='alterar_item.php?id=$id' method='post'>";
    echo "<div class='mb-3'>";
    echo "<label for='id_item' class='form-label'>Id</label>";
    echo "<input type='email' class='form-control' id='id_item' name='id_item' value='$id' disabled>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='nome_item' class='form-label'>Nome do Item</label>";
    echo "<input type='text' class='form-control' id='nome_item' name='nome_item' value='$nome'>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='desc_item' class='form-label'>Email</label>";
    echo "<input type='text' class='form-control' id='desc_item' name='desc_item' value='$desc'>";
                
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='arquivo' class='form-label'>Senha</label>";
    echo "<input type='file' class='form-control' id='arquivo' name='arquivo' value='$img' disabled>";
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<label for='cod_us' class='form-label'>Perfil</label>";
    echo "<input type='text' class='form-control' id='cod_us' name='cod_us' value='$cod_us' disabled>";
    echo "</div>";
    
    echo "<button type='submit' class='btn btn-primary btn-lg form-control'>Editar Item</button>";
    echo "</form>";
    echo "</div>";

    

} else {
    echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
    echo "<div class='col-auto card p-5 text-center'>";
    echo "<div class='card-header'>";
    echo "<i class='material-icons' style='color:red; align: center;'>error</i>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Item não encontrado</h5>";
    echo "Error: 593 - ID ".$id." não encontrado<br>" ;
    echo "<br><a href='../../admin/painel.php' class='btn btn-primary'>Ir para listagem</a>";
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
 