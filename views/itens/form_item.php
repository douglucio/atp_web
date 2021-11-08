
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Itens</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5" >Cadastro de Item</h1>
        <form action="inserir_item.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome_item" class="form-label">Nome do item</label>
                <input type="text" class="form-control" id="nome_item" name="nome_item">
                
            </div>
            <div class="mb-3">
                <label for="desc_item" class="form-label">Descrição do item</label>
                <input type="text" class="form-control" id="desc_item" name="desc_item" required>
                
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="arquivo">Upload</label>
                <input type="file" class="form-control" id="arquivo" name="arquivo">
            </div>
            <button type="submit" class="btn btn-primary btn-lg form-control">Cadastrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 