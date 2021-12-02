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
    <title>Relatorios</title>
</head>
<body>
<?php
  require "../../layouts/nav.php";
?>
    <div class="container">
    <h3 class="text-center">Historíco de Empréstimos</h3>
    <?php
    
    $sql = "SELECT id_emp, data_emp, it.img_iten, it.nome_iten, data_dev FROM emprestimos INNER JOIN itens it ON emprestimos.cod_iten = it.id_iten WHERE solicitante =  ".$_SESSION['usuarioId'];
    $result = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        
        echo "<table class='table table-sm' id='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'> Data </th>";
                echo "<th scope='col'> Imagem </th>";
                echo "<th scope='col'> Item </th>";
                echo "<th scope='col'> Data Devolução </th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $value) {
            echo "<tr>";
                echo "<td>".$value['data_emp']."</td>";
                echo "<td><img src=../itens/".$value['img_iten']." height='30' width='40'></td>";
                echo "<td>".$value['nome_iten']."</td>";
                echo "<td>".$value['data_dev']."</td>";
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
</html>
 