<?php
 session_start();

 require '../../config/connect.php';

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
    <link rel="stylesheet" href="../css/style.css">
    <title>Painel Administrativo</title>
</head>
<body>
<?php
  require "../../layouts/nav.php";
?>
<div class="container">
        <h3 class="text-center">Resultado da Busca</h3>
        <form action="buscar_item.php" method="post">
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" name="buscar" placeholder="buscar pelo nome do item" aria-label="Recipient's username" aria-describedby="button-addon2" required>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
    </form>
    
    <button type="button" class="btn btn-success"><a class="rndlink text-white" href="../views/itens/form_item.php"><b>+</b> new item</a></button>
    
    <?php

    $busca = $_POST['buscar'];
    $sql = "SELECT id_iten, img_iten, nome_iten,us.nome,sit_iten FROM itens INNER JOIN usuarios us ON itens.cod_usuario = us.id WHERE us.id !=  ".$_SESSION['usuarioId']." AND sit_iten = 0 AND nome_iten like '%$busca%'";
    $result = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        
        echo "<table class='table table-sm' id='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'> Imagem </th>";
                echo "<th scope='col'> Nome </th>";
                echo "<th scope='col'> Proprietario </th>";
                echo "<th scope='col'> Situa????o </th>";
                echo "<th scope='col'> A??oes </th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        foreach ($result as $value) {
            echo "<tr>";
                echo "<td><img src=./".$value['img_iten']." height='30' width='40'></td>";
                echo "<td>".$value['nome_iten']."</td>";
                echo "<td>".$value['nome']."</td>";
                if ($value['sit_iten'] === "0") {
                    echo "<td>Disponivel</td>";
                  } else {
                    echo "<td>Emprestado</td>";
                  }
                echo "<td><div class='row'><div class='col'><a href='delete.php?id=".$value['id_iten']."'> <i class='material-icons' style='color:red;'>delete</i></a></div><div class='col'><a href='editar.php?id=".$value['id_iten']."'> <i class='material-icons' style='color:green;'>edit</i></a></div></div></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "n??o foram";
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 