<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentí tu musica</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-1.12.4-jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php include("../header.php"); ?>

    <div class="wrapper">

        <div class="container">

            <div class="col-lg-12">

                <center>
                    <h1>Pagina Administrativa</h1>

                    <h3>
                        <?php
                        session_start();

                        if (!isset($_SESSION['admin_login'])) {
                            header("location: ../index.php");
                        }

                        if (isset($_SESSION['personal_login'])) {
                            header("location: ../personal/personal_portada.php");
                        }

                        if (isset($_SESSION['usuarios_login'])) {
                            header("location: ../usuarios/usuarios_portada.php");
                        }

                        if (isset($_SESSION['admin_login'])) {
                        ?>
                            Bienvenido,
                        <?php
                            echo $_SESSION['admin_login'];
                        }
                        ?>
                    </h3>
                    <br>
                    <a href="crud_usuarios/index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Listado de usuarios</button></a>
                    <br>
                    <br>
                    <a href="subir_musica/index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Listado de temas</button></a>
                    <br>
                    <br>
                    <a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>

                </center>
                <hr>
            </div>

            <br><br><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>

        </div>

</body>

</html>