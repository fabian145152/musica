<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="hoja.css">

</head>

<body>
    <?php

    include("coneccion.php");
    // ------------------1er Paso--------------------------------
    //$conexion = $base->query("SELECT / FROM DATOS_US_UARIOS");
    //$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    //la linea de abajo es simplificada
    //con esto ya conectamos a la BBDD

    //--------------------Paginacion---------------------

    $tamagno_pagina = 10;    //cantidad de registros por pagina

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

    $sql_total = "SELECT * FROM mainlogin";
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


    $registros = $base->query("SELECT * FROM mainlogin LIMIT $empezar_desde,$tamagno_pagina")->fetchAll(PDO::FETCH_OBJ);

    // parte del insert
    if (isset($_POST["cr"])) {
        $user = $_POST["User"];
        $mail = $_POST["Mailer"];
        $pass = $_POST["Pass"];
        //El id no hace falta porque es autonumerico
        $sql = "INSERT INTO mainlogin (username, email, password) VALUES (:user, :mail, :pass)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":user" => $user, ":mail" => $mail, ":pass" => $pass));
        header("location:index.php");
    }


    ?>


    <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Id</td>
                <td class="primera_fila">Usuario</td>
                <td class="primera_fila">Email</td>
                <td class="primera_fila">Password</td>
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
                    <td><?php echo $persona->username ?></td>
                    <td><?php echo $persona->email ?></td>
                    <td><?php echo $persona->password ?></td>

                    <td class="bot"><a href="borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <!-- ------------------------------ -->
                    <!-- Estas lineas son de la edicion -->

                    <td class='bot'><a href="editar.php?id=<?php echo $persona->id
                                                            ?> & user=<?php echo $persona->username ?> 
                                                               & mail=<?php echo $persona->email ?> 
                                                               & pass=<?php echo $persona->password ?>">
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
                <td><input type='text' name='User' size='10' class='centrado'></td>
                <td><input type='text' name='Mailer' size='10' class='centrado'></td>
                <td><input type='text' name='Pass' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            <tr>
                <td>

                    <?php

                    // --------------------------------------------------------
                    //aca empieza la parte de abajo con los numeros y saltos de pagina
                    echo "<br>";
                    for ($i = 1; $i <= $total_paginas; $i++) {

                        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
                        //$i tiene que ser un link y lo paso por la url


                    }


                    ?>

                </td>
            </tr>
            </tr>
        </table>
    </form>


    <p>&nbsp;</p>
</body>

</html>