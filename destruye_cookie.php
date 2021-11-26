<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
  

    setcookie("nombre_usuario", "fabian", time() - 1);
    echo "Cookie destruida";
    //header("location:php/inicio.php");
    ?>
</body>

</html>