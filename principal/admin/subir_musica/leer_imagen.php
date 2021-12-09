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
    require("conecta.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pass);
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar";
        exit();
    }
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT FOTO FROM PRODUCTOS WHERE CODIGOARTICULO ='AR01'";
    $resultado = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($resultado)) {
        $ruta_img = $fila["FOTO"];
    }

    ?>
    <div><img src="/curso_php/cap_83_subir_imagenes_al_servidor/imagenes/<?php echo $ruta_img; ?>" alt="Imagen de la herramienta" width="20%"></div>



</body>

</html>