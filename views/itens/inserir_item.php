<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Emprestar & Devolver</title>
</head>
<body>
   
    <?php
    session_start();
    
    if (!isset($_SESSION['usuarioId']) ) header("Location: ../index.php");
    
    require "../../config/connect.php";
    
    /******
     * Upload de imagens
     ******/
     
    // verifica se foi enviado um arquivo
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        
        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];
     
        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
     
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );
     
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;
     
            // Concatena a pasta com o nome
            $destino = 'imagens/'.$novoNome;
     
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                
            $nome  = $_POST['nome_item'];
            $desc = $_POST['desc_item'];
            $us = $_SESSION['usuarioId'];
            $sql = "INSERT INTO itens (nome_iten, desc_iten, img_iten, cod_usuario) VALUES ('$nome', '$desc', '$destino', '$us')";
    
            if (mysqli_query($mysqli, $sql)) {
                echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
                echo "<div class='col-auto card p-5 text-center'>";
                echo "<div class='card-header'>";
                echo "<i class='material-icons' style='color:green; align: center;'>check_circle</i>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Item cadastrado com sucesso!</h5>";
                echo "<p class='card-text'>".$nome."<br>".$destino."</p>";
                echo "<a href='../../admin/painel.php' class='btn btn-primary'>Ir para listagem</a>";
                echo "</div>";
                echo "<div class='card-footer text-muted'>";
                echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
                echo "</div>";
                echo "</div>";
            } else {
                
                echo "<div class='m-0 vh-100 row justify-content-center align-items-center'>";
                echo "<div class='col-auto card p-5 text-center'>";
                echo "<div class='card-header'>";
                echo "<i class='material-icons' style='color:red; align: center;'>error</i>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'Item não cadastrado!</h5>";
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                if (@unlink($destino)) {
                    echo "<br>" . $destino . " foi excluido";
                }
                echo "<a href='../../admin/painel.php' class='btn btn-primary'>Voltar para Painel</a>";
                echo "</div>";
                echo "<div class='card-footer text-muted'>";
                echo "<h4>Emprestar <i class='material-icons' style='color:red;'>compare_arrows</i> Devolver</h4>";
                echo "</div>";
                echo "</div>";

                

            }
    
            mysqli_close($mysqli);
    
            }
            else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else
        echo 'Você não enviou nenhum arquivo!';
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 