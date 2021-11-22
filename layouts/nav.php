
<?php
    define("ROOT", dirname(__FILE__));
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Emprestar <i class="material-icons" style="color:red;">compare_arrows</i> Devolver</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/admin/painel.php">Meus Itens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/views/itens/itens_disp.php">Itens Disponiveis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/views/emprestimos/emp_rel.php">Meus Emprestimos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/views/emprestimos/emp_rel.php">Relatorios</a>
        </li>

       <?php 
        $url = $_SERVER['DOCUMENT_ROOT'];
        if ($_SESSION['usuarioNiveisAcessoId'] > 0) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link active' aria-current='page' href='".$url."/views/usuarios/consulta.php'>Usuarios</a>";
            echo "</li>";
        }
       
       ?>
        
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#"><?php echo "olá, ".$_SESSION['usuarioNome'] ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/views/usuarios/deslogar.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>