<?php

session_start();
include_once ('database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){


if (isset($_GET['id'])){
    $id = intval($_GET['id']);

    $consulta = $conexion->query("DELETE FROM persona WHERE id='$id'");
    
if ($consulta){
    echo "registro borrado con exito";
    
}else{
    echo "registro no borrado";
}
}
}else{
    echo header("location: login.php");
    
}
?>