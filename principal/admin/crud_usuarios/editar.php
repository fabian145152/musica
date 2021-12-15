<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
  <title>Sentí tu musica</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../js/jquery-1.12.4-jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>

  <link rel="styleshet" href="../../css/main.css">
</head>

<body>
  <?php include("../../header.php"); ?>
  <h1 style="text-align: center;">ACTUALIZAR</h1>
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
    $nombre = $_GET["user"];
    $apellido = $_GET["mail"];
    $password = $_GET["pass"];
    $role = $_GET["rol"];
  } else {

    $id = $_POST["id"];             //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $nombre = $_POST["user"];        //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $apellido = $_POST["mail"];      //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $password = $_POST["pass"];     //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $role = $_POST["rol"];



    $sql = "UPDATE mainlogin SET username=:miUser, email=:miMail, password=:miPass, role=:miRol WHERE id=:miId";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":miId" => $id, ":miUser" => $nombre, ":miMail" => $apellido, ":miPass" => $password, ":miRol" => $role));

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
        <td>Nombre de usuario</td>
        <td><label for="user"></label>
          <input type="text" name="user" id="user" value="<?php echo $nombre ?>" required>
        </td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><label for="mail"></label>
          <input type="text" name="mail" id="mail" value="<?php echo $apellido ?>" required>
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="pass"></label>
          <input type="text" name="pass" id="pass" value="<?php echo $password ?>" required>
        </td>
      </tr>

      <tr>
        <td>Role</td>
        <td>
          <p style="text-align: left;">
            <input type="radio" id="rol" name="rol" value="admin" required>
              <label for="html">
              Administrador
            </label><br>
              <input type="radio" id="rol" name="rol" value="usuario">
              <label for="css">
              Usuario
            </label><br>
              <input type="radio" id="rol" name="rol" value="personal">
              <label for="javascript">
              Personal
            </label><br><br>
          </p>
        </td>
      </tr>


      <tr>
        <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  <tr><a href="index.php" class="btn btn-success btn-block">
      <p style="text-align: center;">Volver</p>
    </a></tr>
</body>

</html>