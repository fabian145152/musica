<?php

include("coneccion.php");

$id = $_GET["id"];

$base->query("DELETE FROM discos WHERE id='$id'");

header("location:index.php");
