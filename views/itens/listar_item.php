<?php
 session_start();

 if (!isset($_SESSION['usuarioId'])) header("Location: ../../index.php");
   

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
    <title>Listar Itens</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center">Lista de Itens</h1>
        <form action="buscar.php" method="post">
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" name="buscar" placeholder="buscar pelo nome ou email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
    </form>
    <a href="../../index.php">Voltar para o Index</a>
    <?php

    require '../../config/connect.php';
    $sql = "SELECT * FROM itens";
    $result = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        
        echo "<table class='table table-sm' id='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'> imagem </th>";
                echo "<th scope='col'> Nome </th>";
                echo "<th scope='col'> Proprietario </th>";
                echo "<th scope='col'> Situação </th>";
                echo "<th scope='col'> Açoes </th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $value) {
            echo "<tr>";
                echo "<td><img src=".$value['img_iten']." height='30' width='40'></td>";
                echo "<td>".$value['nome_iten']."</td>";
                echo "<td>".$value['cod_usuario']."</td>";
                echo "<td>".$value['sit_iten']."</td>";
                echo "<td><div class='row'><div class='col'><a href='delete_item.php?id=".$value['id_iten']."'> <i class='material-icons' style='color:red;'>delete</i></a></div><div class='col'><a href='editar_item.php?id=".$value['id_iten']."'> <i class='material-icons' style='color:green;'>edit</i></a></div></div></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Não encontramos dados para essa consulta";
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
<img src="" alt="">
</html>
 