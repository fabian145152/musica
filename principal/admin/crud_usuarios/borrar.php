<?php

include("coneccion.php");

$id = $_GET["id"];

$base->query("DELETE FROM mainlogin WHERE id='$id'");

header("location:index.php");
