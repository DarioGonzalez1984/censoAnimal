<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){


$cidueno =$_POST['cidueno'];
$nombre =$_POST['nombre'];
$especie=$_POST['especie'];
$sexo =$_POST['sexo'];
$castrado = $_POST['castrado'];
$reqcastracion = $_POST['reqcastracion'];

$id = $_POST['id'];
if($cidueno&&$nombre&&$especie&&$sexo&&$castrado&&$reqcastracion){
	include('database.php');
	//$registro = "UPDATE persona set ci ='$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', cantanimales='$cantanimales' 
	//WHERE id='$id'";
  // $resultado = mysqli_query($conexion,$registro);

   $update = $conexion->query("UPDATE animal SET cidueno ='$cidueno', nombre='$nombre', especie='$especie', sexo='$sexo', castrado='$castrado', reqcastracion='$reqcastracion' WHERE id='$id'");
	
   $resultado = mysqli_query($conexion,$update);

}

header('Location: obteneranimales.php');

}else{
  echo header("location: login.php");
  
}


?>