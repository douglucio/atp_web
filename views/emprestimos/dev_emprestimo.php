<?php
 session_start();

 require "../../config/connect.php";

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
    <link rel="stylesheet" href="../../css/style.css">
    <title>Solicitar Emprestimo</title>
</head>
<body>
    
    <?php

    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM emprestimos WHERE id_emp = $id;");
    $total = mysqli_num_rows($result); 
    
    
    if ($total > 0) {
        
        foreach ($result as $value) {
            $id = $value['id_emp'];
            $solicitante = $value['solicitante'];
            $item = $value['cod_iten'];
            $data_emp = $value['data_emp'];
            $data_dev = $value['data_dev'];
        }

        $sql = "UPDATE emprestimos SET data_dev = current_timestamp() WHERE id_emp = $id;";
        $abc = "UPDATE itens SET sit_iten = 0 WHERE id_iten = ".$item;

        if (mysqli_query($mysqli, $sql)) {

            mysqli_query($mysqli, $abc);

            echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
            echo "<div class='col-auto card p-5 text-center'>";
            echo "<div class='card-header'>";
            echo "<i class='material-icons' style='color:green; align: center;'>check_circle</i>";
            echo "</div>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Item devolvido  com sucesso!</h5>";
            echo "<p class='card-text'>".$item."  </p>";
            echo "<a href='../itens/itens_disp.php' class='btn btn-primary'>Ir para itens disponiveis</a>";
            echo "</div>";
            echo "<div class='card-footer text-muted'>";
            echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
            echo "</div>";
            echo "</div>";
        }

    } else {
        echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
        echo "<div class='col-auto card p-5 text-center'>";
        echo "<div class='card-header'>";
        echo "<i class='material-icons' style='color:red; align: center;'>error</i>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Emprestimo não encontrado</h5>";
        echo "Error: 593 - ID ".$id." não encontrado<br>" ;
        echo "<br><a href='../itens/itens_disp.php' class='btn btn-primary'>Ir para itens disponiveis</a>";
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
 