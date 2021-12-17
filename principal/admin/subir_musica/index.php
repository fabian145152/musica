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
    include("../../header.php");
    include("coneccion.php");
    // ------------------1er Paso--------------------------------
    //$conexion = $base->query("SELECT / FROM DATOS_USUARIOS");
    //$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    //la linea de abajo es simplificada
    //con esto ya conectamos a la BBDD

    //--------------------Paginacion---------------------

    $tamagno_pagina = 7;    //cantidad de registros por pagina

    //--------------Sigue aca desde abajo de todo--------------
    if (isset($_GET["pagina"])) {
        //con el isset que se ejecute una vez pulsado el promernumero, porque si no ma da que la variable pagina no esta definida.
        if ($_GET["pagina"] == 1) {

            header("Location:index.php");
        } else {

            $pagina = $_GET["pagina"];
        }
    } else {
        $pagina = 1;
    }
    //---------------------------------------------------------

    $empezar_desde = ($pagina - 1) * $tamagno_pagina;
    //si pulso el 3 pagina =3 con el metodo get, 3-1=2 y 2*3 =6
    //guardo en la variable el numero 6 para que lo sustituya en el limit
    //limit 6, 3 

    $sql_total = "SELECT * FROM discos";
    /*
    Para paginar agrego LIMIT, 2 parametros primer registro y cantidad de registros.
    Lo primero que necesito es saber cuantos registros tiene la tabla
    y en cuantas paginas lo va a dividir.
    Creo variable $tamagno_pagina
    
    
    */
    $resultado = $base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas = $resultado->rowCount();    //cuenta la cantidad de filas
    $total_paginas = ceil($num_filas / $tamagno_pagina);  //me dice la cantidad de paginas que voy a tener
    //el ceil me da un numero entero

    //--------------------Fin Paginacion-----------------


    $registros = $base->query("SELECT * FROM discos ORDER BY banda, disco, cancion_1 asc  LIMIT 
    $empezar_desde,$tamagno_pagina")->fetchAll(PDO::FETCH_OBJ);

    // parte del insert
    if (isset($_POST["cr"])) {
        $ban = $_POST["Banda"];
        $dis = $_POST["Disco"];
        $ani = $_POST["Anio"];
        $cancion_1 = $_POST["Cancion_1"];


        $nombre_mp_3 = $_FILES["Mp_3"]["name"];
        $tipo_mp_3 = $_FILES["Mp_3"]["type"];
        $tamagno_mp_3 = $_FILES["Mp_3"]["size"];
        echo "<br>";
        echo "Nombre del tema: " . $nombre_mp_3 = $_FILES["Mp_3"]["name"];
        echo "<br>";
        echo "Extension: " . $tipo_mp_3 = $_FILES["Mp_3"]["type"];
        echo "<br>";
        echo  "Tamaño del archivo: " . $tamagno_mp_3 = $_FILES["Mp_3"]["size"];
        echo "<br>";


        if ($tamagno_mp_3 <= 30000000) {     //la carga del archivo se lleva a cabo si en menor a 3000000 de bytes

            if ($tipo_mp_3 == "mp_3/audio" || "mp_3/mpeg") {

                //Es la ruta de la carpeta donde se guardaran las imagnenes
                $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . '/musica/principal/admin/mp3_mpeg/mp3_mpeg/';



                echo "Carpeta destino " . $carpeta_destino;
                echo "<br>";
                echo "Nombre del tema" . $nombre_mp_3;
                echo "<br>";
                $lugar = $carpeta_destino . $nombre_mp_3;
                echo $lugar;



                //Movemos la imagen de la carpeta temporal a la carpeta de destino
                move_uploaded_file($_FILES['Mp_3']['tmp_name'], $carpeta_destino . $nombre_mp_3);

                echo "Solo se pueden subir archivos mp3";
            }
        } else {
            echo "<br>El archivo no debe superar los 2MB";
        }
        echo "<br>";
        echo "<a href='index.php'>Inicio</a>";
        echo "<br>";
        echo "<br>";
        echo "<a href='leer_imagen.php'>Ver las imagenes</a>";

        $nombre_mp_3 =  $carpeta_destino . $nombre_mp_3;
        //El id no hace falta porque es autonumerico
        $sql = "INSERT INTO discos (banda, disco, anio, cancion_1, mp_3) VALUES 
                                   (:banda, :disco, :anio, :cancion_1, :mp_3)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(
            ":banda" => $ban,
            ":disco" => $dis,
            ":anio" => $ani,
            ":cancion_1" => $cancion_1,
            ":mp_3" => $nombre_mp_3

        ));
        //header("location:index.php");
    }

    ?>



    <h1>Editor<span class="subtitulo"> de albumes</span></h1>





    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <table width="50%" border="2" align="center">
                        <div class="form-group">
                            <div class="col-sm-12">

                                <tr>
                                    <td>Id</td>
                                    <td class="primera_fila">Banda</td>
                                    <td class="primera_fila">Disco</td>
                                    <td class="primera_fila">Año</td>
                                    <td class="primera_fila">Canción</td>
                                    <td class="primera_fila">Tema en mp3</td>
                                    <td class="sin">&nbsp;</td>
                                    <td class="sin">&nbsp;</td>
                                    <td class="sin">&nbsp;</td>
                                </tr>


                                <!-- Esta parte es para que las lineas se repitan -->
                                <?php
                                //--------------------------------------------------------------------------
                                // Esta parte es del READ
                                foreach ($registros as $persona) :
                                    /*
            Este es el array donde tengo almacenados todos los objetos de mi BBDD
            $persona es una variable cualquiera
            */
                                    //-----------------------------------------------------------------------



                                ?>
                                    <tr>
                                        <td><?php echo $persona->id ?> </td>
                                        <td><?php echo $persona->banda ?></td>
                                        <td><?php echo $persona->disco ?></td>
                                        <td><?php echo $persona->anio ?></td>
                                        <td><?php echo $persona->cancion_1 ?></td>
                                        <td><?php //echo $persona->mp_3 
                                            ?>
                                            <?php $can = $persona->mp_3;

                                            echo $can;
                                            //---------------------------------------------------------------------------------------
                                            //---------------------------------------------------------------------------------------
                                            //          Ver aca o puedo reproducir el tema
                                            //---------------------------------------------------------------------------------------
                                            //---------------------------------------------------------------------------------------

                                            ?>
                                            <audio controls='' preload='none'>

                                                <audio class='embed-responsive-item' controls='' preload='none'>
                                                    <?php
                                                    echo "<source src='mp3_mpeg/$can' type='audio/mp3'>"
                                                    ?>
                                                </audio><br>
                                        </td>

                                        <td class=" bot"><a href="borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a>
                                        </td>
                                        <!-- ------------------------------ -->
                                        <!-- Estas lineas son de la edicion -->

                                        <td class='bot'><a href="editar.php?id=<?php echo $persona->id
                                                                                ?> & banda=<?php echo $persona->banda ?> 
                                                                                   & disco=<?php echo $persona->disco ?> 
                                                                                   & anio=<?php echo $persona->anio ?>
                                                                                   & cancion_1=<?php echo $persona->cancion_1  ?>
                                                                                   & Mp_3=<?php echo $persona->mp_3 ?>">
                                                <input type='button' name='up' id='up' value='Actualizar'></a></td>
                                        <!-- ------------------------------ -->
                                    </tr>
                                <?php

                                // READ-------------------------------------------------------------------------------------
                                endforeach;
                                //Otra forma de hacerlo es concatenando todo para que quede php dentro de cada linea de html
                                //------------------------------------------------------------------------------------------

                                ?>

                                <!-- Esta es la parte del insert con la linea <form action=" <?php //echo $_SERVER['PHP_SELF']; 
                                                                                                ?>" method="post">-->
                                <tr>
                                    <td></td>
                                    <td><input type='text' name='Banda' size='10' class='centrado' placeholder="Nombre Banda"></td>
                                    <td><input type='text' name='Disco' size='10' class='centrado' placeholder="Nombre Album"></td>
                                    <td><input type='text' name='Anio' size='5' class='centrado' placeholder="Año Edicion"></td>
                                    <td><input type='text' name='Cancion_1' size='15' class='centrado' placeholder="0x_nombre_tema"></td>
                                    <td><input type="file" name="Mp_3" size="10" class="centrado"></td>
                                    <td class='bot'><input type='submit' name='cr' id='cr' value='Insert'></td>
                                <tr>


                                    <?php
                                    echo "<p>Pagina:</p>";
                                    // --------------------------------------------------------
                                    //aca empieza la parte de abajo con los numeros y saltos de pagina
                                    //echo "<br>";
                                    for ($i = 1; $i <= $total_paginas; $i++) {

                                        echo "<a href='?pagina=" . $i . "'> " . $i  . "</a> ";
                                        //$i tiene que ser un link y lo paso por la url

                                    }

                                    ?>

                                </tr>
                            </div>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    </form>
    <div>
        <a href="../index.php" class="btn btn-success btn-block">Salir</a>
    </div>


    </div>
    </div>
    </div>
    </div>
</body>

</html>