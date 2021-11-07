<?php 
    require 'config/connect.php';
    
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
    <title>Emprestar & Devolver</title>
</head>
<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="views/usuarios/logar.php" method="post">
                                <h3 class="mb-5">Emprestar <i class="material-icons" style="color:red;">compare_arrows</i> Devolver</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required/>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="senha" name="senha" class="form-control form-control-lg" placeholder="Senha"/>
                                </div>
                                <div class="form-outline mb-4">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Login" style="width:100%;" >
                                </div>
                                <div class="form-outline mb-4">
                                    <p><a class="rndlink" href="views/usuarios/form.php">cadastrar-se</a></p>
                                </div>
                            </form>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
 