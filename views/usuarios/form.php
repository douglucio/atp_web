
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center" >Cadastro de Usuarios</h1>
        <form action="inserir_us.php" method="post">
            <div class="mb-3">
                <label for="nome_us" class="form-label">Nome do Usuário</label>
                <input type="text" class="form-control" id="nome_us" name="nome_us">
                
            </div>
            <div class="mb-3">
                <label for="email_us" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_us" name="email_us" required>
                
            </div>
            <div class="mb-3">
                <label for="senha_us" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha_us" name="senha_us" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg form-control">Cadastrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 