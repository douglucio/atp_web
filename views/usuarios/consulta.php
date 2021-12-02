<?php
 session_start();

 if (!isset($_SESSION['usuarioId']) || $_SESSION['usuarioNiveisAcessoId'] < 1 ) header("Location: ../../index.php");
   

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
    <title>Consultar Usuarios</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Emprestar <i class="material-icons" style="color:red;">compare_arrows</i> Devolver</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../admin/painel.php">Meus Itens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../itens/itens_disp.php">Itens Disponiveis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../emprestimos/emp_rel.php">Meus Emprestimos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../relatorios/list_rel.php">Relatorios</a>
        </li>

       <?php 
        $url = $_SERVER['DOCUMENT_ROOT'];
        if ($_SESSION['usuarioNiveisAcessoId'] > 0) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link active' aria-current='page' href='../usuarios/consulta.php'>Usuarios</a>";
            echo "</li>";
        }
       
       ?>
        
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#"><?php echo "olá, ".$_SESSION['usuarioNome'] ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../usuarios/deslogar.php">Logout</a>
        </li>
      </ul>
    </div>
    <div class="container">
        <h1 class="mt-5 text-center">Lista de Usuários</h1>
        <form action="buscar.php" method="post">
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" name="buscar" placeholder="buscar pelo nome ou email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
    </form>
    <?php

    require '../../config/connect.php';
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($mysqli, $sql);
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        
        echo "<table class='table table-sm' id='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'> ID </th>";
                echo "<th scope='col'> Nome </th>";
                echo "<th scope='col'> Email </th>";
                echo "<th scope='col'> Perfil </th>";
                echo "<th scope='col'> Açoes </th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $value) {
            echo "<tr>";
                echo "<td>".$value['id']."</td>";
                echo "<td>".$value['nome']."</td>";
                echo "<td>".$value['email']."</td>";
                echo "<td>".$value['perfil']."</td>";
                echo "<td><div class='row'><div class='col'><a href='delete.php?id=".$value['id']."'> <i class='material-icons' style='color:red;'>delete</i></a></div><div class='col'><a href='editar.php?id=".$value['id']."'> <i class='material-icons' style='color:green;'>edit</i></a></div></div></td>";
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
<a href=""></a>
</html>
 