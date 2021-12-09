<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de temas</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"></a>
    <script src="../../js/jquery-1.12.4-jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/main.css">


</head>

<body>
    <?php include("../../header.php"); ?>
    <div class="container">


        <div class="login-form">
            <center>
                <h2>Cargar Album</h2>
            </center>
            <form action="datosimagen.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-w-75 text-left">Banda</label>
                    <div class="col-w-75">
                        <input type="text" name="banda" class="form-control" placeholder="Nombre de la Banda">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Album</label>
                    <div class="col-w-75">
                        <input type="text" name="nom_album" class="form-control" placeholder="Nombre de Album" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Año de edición</label>
                    <div class="col-w-75">
                        <input type="text" name="año" class="form-control" placeholder="Año de edicion" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Genero</label>
                    <div class="col-w-75">
                        <input type="text" name="genero" class="form-control" placeholder="Genero/Estilo de musica" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Nombre de Tema</label>
                    <div class="col-w-75">
                        <input type="text" name="nom_tema" class="form-control" placeholder="Nombre del Tema" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Tapa de album</label>
                    <div class="col-w-75">
                        <input type="file" name="imagen" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-w-75 text-left">Tema en MP3</label>
                    <div class="col-w-75">
                        <input type="file" name="mp_3" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-w-75">
                        <input type="submit" name="enviando" class="btn btn-success btn-block" value="Cargar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>


</html>