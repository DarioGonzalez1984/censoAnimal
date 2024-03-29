<?php
session_start();


if (isset($_SESSION['usuario'])) {
    include ('../header.php');
    $idP = !empty($_GET['idP']) ? $_GET['idP'] : 0;
    $linea = '';

    if ($idP) {
        include('../database.php');
        $registro = "SELECT * FROM persona WHERE idP = $idP;";
        $resultado = mysqli_query($conexion, $registro);
        $linea = mysqli_fetch_array($resultado);
    }
} else {
    echo header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Actualizar Persona</title>
</head>

<body id="bod">
   

        <div class="container-fluid" style="width:650px">
            
            <form method="post" action="actualizarpersona.php">
<br>
                <div id= "borde" class="border border" style="padding: 20px;">
                <h1><strong> Editar propietario</strong></h1>
                    <br>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Cédula" class="form-control" name="c1"
                            value="<?php echo $linea['ciP']; ?>" required="true" />
                    </div>
                    <br>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Nombre" class="form-control" name="c2"
                            value="<?php echo $linea['nombreP']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Apellido" class="form-control" name="c3"
                            value="<?php echo $linea['apellidoP']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Teléfono" class="form-control" name="c4"
                            value="<?php echo $linea['telefonoP']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Dirección" class="form-control" name="c5"
                            value="<?php echo $linea['direccionP']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Cantidad Animales" class="form-control" name="c6"
                            value="<?php echo $linea['cantanimales']; ?>" required="true" />
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="hidden" placeholder="Dirección" class="form-control" name="idP"
                            value="<?php echo $idP; ?>" required="true" />
                    </div>
                    <br>
                        <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="location" name="c7"  onchange="locationSelectHandler(this)">
                            <option hidden selected>-- Seleccionar Localidad --</option>
                            <option value="Paysandu ciudad"<?php if($linea['location']=="Paysandu ciudad"){echo"selected";}?>>Paysandu ciudad</option>
                            <option value="Quebracho" <?php if($linea['location']=="Quebracho"){echo"selected";}?>>Quebracho</option>
                            <option value="Guichon" <?php if($linea['location']=="Guichon"){echo"selected";}?>>Guichon</option>
                            <option value="Chapicuy" <?php if($linea['location']=="Chapicuy"){echo"selected";}?>>Chapicuy</option>
                            <option value="La Tentacion" <?php if($linea['location']=="La Tentacion"){echo"selected";}?>>La Tentacion</option>
                            <option value="Porvenir" <?php if($linea['location']=="Porvenir"){echo"selected";}?>>Porvenir</option>
                            <option value="Esperanza" <?php if($linea['location']=="Esperanza"){echo"selected";}?>>Esperanza</option>
                            <option value="Constancia" <?php if($linea['location']=="Constancia"){echo"selected";}?>>Constancia</option>
                            <option value="Tambores" <?php if($linea['location']=="Tambores"){echo"selected";}?>>Tambores</option>
                            <option value="Piñera" <?php if($linea['location']=="Piñera"){echo"selected";}?>>Piñera</option>
                            <option value="Beisso" <?php if($linea['location']=="Beisso"){echo"selected";}?>>Beisso</option>
                            <option value="Piedra Sola" <?php if($linea['location']=="Piedra Sola"){echo"selected";}?>>Piedra Sola</option>
                            <option value="Tiatucura" <?php if($linea['location']=="Tiatucura"){echo"selected";}?>>Tiatucura</option>
                            <option value="Cuchilla de Fuego" <?php if($linea['location']=="Cuchilla de Fuego"){echo"selected";}?>>Cuchilla de Fuego</option>
                            <option value="Piedras Coloradas" <?php if($linea['location']=="Piedras Coloradas"){echo"selected";}?>>Piedras Coloradas</option>
                            <option value="Colonia 19 de Abril" <?php if($linea['location']=="Colonia 19 de Abril"){echo"selected";}?>>Colonia 19 de Abril</option>
                            <option value="Orgoroso" <?php if($linea['location']=="Orgoroso"){echo"selected";}?>>Orgoroso</option>
                            <option value="Arroyo Negro" <?php if($linea['location']=="Arroyo Negro"){echo"selected";}?>>Arroyo Negro</option>
                            <option value="Morato" <?php if($linea['location']=="Morato"){echo"selected";}?>>Morato</option>
                            <option value="Merinos" <?php if($linea['location']=="Merinos"){echo"selected";}?>>Merinos</option>
                            <option value="Arbolito" <?php if($linea['location']=="Arbolito"){echo"selected";}?>>Arbolito</option>
                            <option value="El Eucalipto" <?php if($linea['location']=="El Eucalipto"){echo"selected";}?>>El Eucalipto</option>
                            <option value="Cañada Del Pueblo" <?php if($linea['location']=="Cañada Del Pueblo"){echo"selected";}?>>Cañada Del Pueblo</option>
                            <option value="Buricayupi" <?php if($linea['location']=="Buricayupi"){echo"selected";}?>>Buricayupi</option>
                            <option value="Soto" <?php if($linea['location']=="Soto"){echo"selected";}?>>Soto</option>
                            <option value="Lorenzo Geyres" <?php if($linea['location']=="Lorenzo Geyres"){echo"selected";}?>>Lorenzo Geyres</option>
                            <option value="Estacion Porvenir" <?php if($linea['location']=="Estacion Porvenir"){echo"selected";}?>>Estacion Porvenir</option>
                        </select>
                        <br>
                        <select class="form-select form-select-lg mb-3" aria-label="Default select example" id="zone" name="c8">
                            <option value="" hidden selected>-- Seleccionar Zona --</option>
                            <option value="Norte" <?php if($linea['zone']=="Norte"){echo"selected";}?>>Norte</option>
                            <option value="Sur" <?php if($linea['zone']=="Sur"){echo"selected";}?>>Sur</option>
                            <option value="Centro" <?php if($linea['zone']=="Centro"){echo"selected";}?>>Centro</option>
                            <option value="Este" <?php if($linea['zone']=="Este"){echo"selected";}?>>Este</option>
                            <option value="Oeste" <?php if($linea['zone']=="Oeste"){echo"selected";}?>>Oeste</option>
                        </select>
                        <br>
                    <!-- Submit button -->
                    
                    <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Actualizar</button>
                        </div>
                </div>
        </div>
    </div>
    </form>

</body>

</html>
<script>
        function hide() {
            var zone = document.getElementById('zone');
            zone.style.visibility = 'hidden';
        }
        function show() {
            var zone = document.getElementById('zone');
            zone.style.visibility = 'visible';
        }
        function clear(){
            document.getElementById('zone').value="";  
        }
        function locationSelectHandler(select) {
            var zone = document.getElementById('zone');
            if (select.value == 'Paysandu ciudad') {
                show();
                // clear();
            } else {
                hide();
                clear();
            }
        }
    </script>