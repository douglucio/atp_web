<?php

require "connect.php";

$id = 3;

mysqli_query($mysqli, "DELETE FROM teste WHERE id = $id;");

?>