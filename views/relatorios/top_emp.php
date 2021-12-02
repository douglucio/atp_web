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
    <h3 class="text-center">Quantidade de empréstimos por itens</h3>
    <?php
    
    $sql = "SELECT id_iten, nome_iten,us.nome FROM itens INNER JOIN usuarios us ON itens.cod_usuario = us.id";
    $result = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        
        echo "<table class='table table-sm' id='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'> Codigo do Item </th>";
                echo "<th scope='col'> Nome do Item </th>";
                echo "<th scope='col'> Proprietário </th>";
                echo "<th scope='col'> total de Emprestimos </th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $maior = array();
        $cc = "";
        $lista = array("");
        foreach ($result as $value) {
            $sql_c = "SELECT count(cod_iten) FROM emprestimos WHERE cod_iten = ".$value['id_iten'];
            $contagem = mysqli_query($mysqli, $sql_c);
            foreach ($contagem as $cont) {
                $cc = implode($cont);
            }
            
            echo "<tr>";
                echo "<td>".$value['id_iten']."</td>";
                echo "<td>".$value['nome_iten']."</td>";
                echo "<td>".$value['nome']."</td>";
                echo "<td>".$cc."</td>";
            echo "</tr>";
            
            
          }
          
        echo "</tbody>";
        echo "</table>";
        
    } else {
        echo "Não encontramos dados para essa consulta";
    }

    // function for bubble sort

    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 