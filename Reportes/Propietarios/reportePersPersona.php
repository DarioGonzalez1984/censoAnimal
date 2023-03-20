<?php
	require '../plantilla.php';
	// require '../censoAnimal/database.php';
    
    // $id= $_GET["id"];
    $ci= $_GET["ci"];
	$ciduenoC= $_GET["ciduenoC"];
	// $ciduenoA= $_GET["ciduenoA"];

	if ($_GET["id"] == 99){
		$id = $ciduenoC;

	}else{
		$id = $_GET["id"];
	}
    require 'D:\Desarrollo\laragon\www\censoAnimal\database.php';
	
	// $query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
    $queryPersona = "SELECT * FROM persona WHERE ciP = '$ci'";
	// $queryPersona = "SELECT * FROM persona INNER JOIN animal On persona.ci = animal.cidueno WHERE persona.ci = '$ci'";
	$resultadoPersona = $conexion->query($queryPersona);
	
	// SELECT column_name(s)
	// FROM table1
	// INNER JOIN table2
	// ON table1.column_name = table2.column_name;




    $queryAnimal = "SELECT * FROM animal WHERE ciduenoA = '$ci'";
    $resultadoAnimal = $conexion->query($queryAnimal);

    $queryCastracion = "SELECT * FROM castracion WHERE ciduenoC = '$ci'";
    $resultadoCastracion = $conexion->query($queryCastracion);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// if ($resultadoPersona == null){
	if ($row = $resultadoPersona->fetch_assoc())
	{
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(5,'Reporte de Censo Animal');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Datos del propietario');
    $pdf->Ln();
	$pdf->Ln();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Cedula',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Apellido',1,0,'C',1);
    $pdf->Cell(25,6,'Telefono',1,0,'C',1);
    $pdf->Cell(70,6,'Direccion',1,0,'C',1);
    $pdf->Cell(22,6,'Cantidad',1,0,'C',1);
	
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
		$pdf->Cell(22,6,utf8_decode($row['ciP']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['nombreP']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['apellidoP']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row['telefonoP']),1,0,'C');
        $pdf->Cell(70,6,utf8_decode($row['direccionP']),1,0,'C');
        $pdf->Cell(22,6,utf8_decode($row['cantanimales']),1,1,'C');
	
	}else{
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Write(5,'No hay resultados');
		$pdf->Ln();
	}

		$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Animales asociados');
    $pdf->Ln();
	$pdf->Ln();
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Especie',1,0,'C',1);
	$pdf->Cell(30,6,'Sexo',1,0,'C',1);
    $pdf->Cell(25,6,'Castrado',1,0,'C',1);
    $pdf->Cell(60,6,'Requiere castracion',1,0,'C',1);
    
	
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
	while ($row2 = mysqli_fetch_assoc($resultadoAnimal)) 
    // if($row2 = $resultadoAnimal->fetch_assoc())
	{ 
		$pdf->Cell(22,6,utf8_decode($row2['nombreA']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row2['especieA']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row2['sexoA']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row2['castrado']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($row2['reqcastracion']),1,1,'C');
	
	// }else{
	// 	$pdf->Ln();
	// 	$pdf->SetFont('Arial', 'B', 16);
	// 	$pdf->Write(5,'No hay resultados');
	// 	$pdf->Ln();
	}
    
    

    // if($row3 = $resultadoCastracion->fetch_assoc())
	// {
		$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Castrados');
    $pdf->Ln();
	$pdf->Ln();
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Fecha',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'IDchip',1,0,'C',1);
    $pdf->Cell(25,6,'Especie',1,0,'C',1);
    $pdf->Cell(60,6,'Sexo',1,0,'C',1);

    $pdf->SetFont('Arial','',10);
	$pdf->Ln();
	while ($row3 = mysqli_fetch_assoc($resultadoCastracion)) 
    // if($row2 = $resultadoAnimal->fetch_assoc())
	{ 
		$pdf->Cell(22,6,utf8_decode($row3['fecastracion']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row3['nmascota']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row3['idchip']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row3['especieC']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($row3['sexoC']),1,1,'C');

	// }else{
	// 	$pdf->Ln();
	// 	$pdf->SetFont('Arial', 'B', 16);
	// 	$pdf->Write(5,'No hay resultados');
	// 	$pdf->Ln();
	}

	$pdf->Output();
?>