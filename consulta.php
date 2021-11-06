


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
    <div class="container">
    <?php
    require 'connect.php';

    /*
    mysqli_query($mysqli, "INSERT INTO teste (nome,perfil) values ('Jose Ferreira',1);");
    */

// Perform query
if ($result = mysqli_query($mysqli, "SELECT * FROM teste")) {
 /*   
  echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
*/

echo "<table class='consulta'>";
    echo "<tr>";
        echo "<th> ID </th>";
        echo "<th> Nome </th>";
        echo "<th> Perfil </th>";
        echo "<th> Açoes </th>";
    echo "</tr>";

  foreach ($result as $value) {
    echo "<tr>";
        echo "<td>".$value['id']."</td>";
        echo "<td>".$value['nome']."</td>";
        echo "<td>".$value['perfil']."</td>";
        echo "<td><a href='delete.php?'".$value['id']."'> <i class='material-icons' style='color:red;'>delete</i></a></td>";
    echo "</tr>";
  }
  echo "</table>";
}


?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
<a href=""></a>
</html>
 