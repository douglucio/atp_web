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
            <a class="nav-link " aria-current="page" href="#"><?php echo "ol??, ".$_SESSION['usuarioNome'] ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../usuarios/deslogar.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
    <h3 class="text-center">Lista de Rel??torios</h3>
    <ul class="list-group">
        <li class="list-group-item"><a href="hist_emp.php">Hist??rico de Empr??stimos</a></li>
        <?php
            if ($_SESSION['usuarioNiveisAcessoId'] > 0) {
                echo "<li class='list-group-item'><a href='top_emp.php'>Quantidade de Empr??stimo por itens</a></li>";
            }
        ?>
    </ul>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 