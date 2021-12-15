<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
  <title>Sentí tu musica</title>

  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../js/jquery-1.12.4-jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/main.css">
</head>

<body>


  <?php
  //------------------------------------------------------------------------
  //Hago esta linea para conectarme y guardad los datos actualizados
  include("coneccion.php");
  include("../../header.php");
  //------------------------------------------------------------------------

  /*
  Ahora tengo que hacer un if para que me lea los $_GET cuando trae info de la otra pagina y no le el $_POST que uso para hacer el update
  */

  if (!isset($_POST["bot_actualizar"])) {
    $id = $_GET["id"];
    $banda = $_GET["banda"];
    $disco = $_GET["disco"];
    $anio = $_GET["anio"];
    $cancion_1 = $_GET["cancion_1"];
  } else {

    $id = $_POST["id"];             //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $banda = $_POST["banda"];        //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $disco = $_POST["disco"];      //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $anio = $_POST["anio"];     //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $cancion_1 = $_POST["cancion_1"];



    $sql = "UPDATE discos SET banda=:miBanda, disco=:miDisco, anio=:miAnio, cancion_1=:miCancion_1 WHERE id=:miId";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(
      ":miId" => $id,
      ":miBanda" => $banda,
      ":miDisco" => $disco,
      ":miAnio" => $anio,
      "miCancion_1" => $cancion_1
    ));

    header("location:index.php");
  }
  ?>

  <p>

  </p>
  <h1>Actualizar</h1>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--
  Para usar la linea anterior me conecte a la BBDD, y use el metodo post porque si uso el get viajan en la url y se me sobreescribirian
  con PHP_SELF Mando todo a esta misma pagina

-->
    <table width="25%" border="2" align="center">
      <tr>
        <td></td>
        <td><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <!-- Si quiero no mostrar el id saco la etiqueta de php y listo -->
        </td>
      </tr>
      <tr>
        <td>Banda</td>
        <td><label for="banda"></label>
          <input type="text" name="banda" id="banda" value="<?php echo $banda ?>">
        </td>
      </tr>
      <tr>
        <td>Disco</td>
        <td><label for="disco"></label>
          <input type="text" name="disco" id="disco" value="<?php echo $disco ?>">
        </td>
      </tr>
      <tr>
        <td>Año</td>
        <td><label for="anio"></label>
          <input type="text" name="anio" id="anio" value="<?php echo $anio ?>">
        </td>
      </tr>

      <tr>
        <td>Canción</td>
        <td><label for="cancion_1"></label>
          <input type="text" name="cancion_1" id="cancion_1" value="<?php echo $cancion_1 ?>">
        </td>
      </tr>

      <tr>
        <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  <a href="index.php">
    <p style="text-align: center;" class="btn btn-success btn-block">Volver
  </a>
</body>

</html>