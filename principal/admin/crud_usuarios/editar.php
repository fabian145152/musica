<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

  <h1>ACTUALIZAR</h1>
  <?php
  //------------------------------------------------------------------------
  //Hago esta linea para conectarme y guardad los datos actualizados
  include("coneccion.php");
  //------------------------------------------------------------------------

  /*
  Ahora tengo que hacer un if para que me lea los $_GET cuando trae info de la otra pagina y no le el $_POST que uso para hacer el update
  */

  if (!isset($_POST["bot_actualizar"])) {
    $id = $_GET["id"];
    $nombre = $_GET["nom"];
    $apellido = $_GET["ape"];
    $password = $_GET["dir"];
  } else {

    $id = $_POST["id"];             //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $nombre = $_POST["nom"];        //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $apellido = $_POST["ape"];      //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $password = $_POST["dir"];     //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post



    $sql = "UPDATE datos_usuarios SET nombre=:miNom, apellido=:miApe, direccion=:miDir WHERE id=:miId";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":miId" => $id, ":miNom" => $nombre, ":miApe" => $apellido, ":miDir" => $password));

    header("location:index.php");
  }
  ?>

  <p>

  </p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--
  Para usar la linea anterior me conecte a la BBDD, y use el metodo post porque si uso el get viajan en la url y se me sobreescribirian
  con PHP_SELF Mando todo a esta misma pagina

-->

    <table width="35%" border="0" align="center">
      <tr>
        <td></td>
        <td><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <!-- Si quiero no mostrar el id saco la etiqueta de php y listo -->
        </td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $nombre ?>">
        </td>
      </tr>
      <tr>
        <td>Apellido</td>
        <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="<?php echo $apellido ?>">
        </td>
      </tr>
      <tr>
        <td>Dirección</td>
        <td><label for="dir"></label>
          <input type="text" name="dir" id="dir" value="<?php echo $password ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>