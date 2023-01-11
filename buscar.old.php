<?php
include_once('database.php');
session_start();


if (isset($_SESSION['usuario'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/w3.css">
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-utilities.css">
        <title>Obtener Castraciones</title>
    </head>

    <body>
        <!-- NavBar -->
        <div class="dropdown">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Censo Animal</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Propietarios
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioPersona.php">Nuevo Propietario</a></li>
                                    <li><a class="dropdown-item" href="obtener.php">Listar propietarios</a></li>
                                    <li><a class="dropdown-item" href="buscar.php">Buscar propietarios</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Animales
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioAnimal.php">Nuevo Animal</a></li>
                                    <li><a class="dropdown-item" href="obtenerAnimales.php">Listar Animales</a></li>
                                    <li><a class="dropdown-item" href="buscar.php">Buscar animales</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Castraciones
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioCastracion.php">Nueva castración</a></li>
                                    <li><a class="dropdown-item" href="obtenerCastraciones.php">Listar Castraciones</a></li>
                                    <li><a class="dropdown-item" href="buscar.php">Buscar Por Id chip</a></li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo  $_SESSION["usuario"]; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="cerrar.php">Cerrar sesión</a></li>

                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="position-relative">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo  $_SESSION["usuario"]; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="cerrar.php">Salir</a></li>

                            </ul>
                </div>
            </nav>
            <!-- NavBar -->
            <div class="container-fluid">
                <div class="d-flex flex-row">
                    <form class="d-flex" method="post" action="buscar.old.php">
                        <div class="container-fluid">
                            <select class="form-select-lg mb-3" aria-label=".form-select-lg example" name="comboSel" id="comboSel" data-show-subtext="true" data-live-search="true">
                                <option value='' selected="true">Buscar por</option>
                                <option value='idchip'>Id Chip</option>
                                <option value='ci'>CI asociado</option>
                            </select>
                        </div>
                        <input type="buscar" class="form-control" placeholder="Buscar" name="buscar">

                        <div class="container-fluid">
                            <button type="submit" class="btn btn-primary btn-block mb-4" style="width:60%">Buscar</button>
                            <a href="../censoAnimal/Reportes/Propietarios/reportePersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>" class="report" title="generar reporte">Reporte</a>
                            <!-- <button type="submit" class="btn btn-default" name="listar">Listar</button> -->
                        </div>
                    </form>
                    <button onclick="location.href='../censoAnimal/Reportes/Propietarios/reportePersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>'">Imprimir</button>
                </div>
            </div>
            <div class="d-flex p-2 bd-highlight">
                <div class="container">
                    <table class="table table-striped">
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Cantidad Animales</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Por</th>
                            <th>Acciones</th>
                        </tr>
                        <?php

                        if (isset($_POST["buscar"])) {

                            $buscar = $_POST['buscar'];
                            $comboSel = $_POST['comboSel'];


                            if ($comboSel == 'ci') {
                                $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscar'");



                                if ($fila1 = mysqli_fetch_array($consultaci)) {

                                    $_SESSION['id'] = $fila1["id"];
                                    $_SESSION['ci'] = $fila1["ci"];;

                                    $id = $fila1["id"];
                                    $ci = $fila1["ci"];
                                    $nombre = $fila1["nombre"];
                                    $apellido = $fila1["apellido"];
                                    $telefono = $fila1["telefono"];
                                    $direccion = $fila1["direccion"];
                                    $cantanimales = $fila1["cantanimales"];
                                    $created_at = $fila1["CREATED_AT"];
                                    $updated_at = $fila1["UPDATED_AT"];
                                    $sesion = $fila1['sesion'];
                        ?>
                                    <tr>
                                        <td><?php echo $ci; ?></td>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $apellido; ?></td>
                                        <td><?php echo $telefono; ?></td>
                                        <td><?php echo $direccion; ?></td>
                                        <td><?php echo $cantanimales; ?></td>
                                        <td><?php echo $created_at; ?></td>
                                        <td><?php echo $updated_at; ?></td>
                                        <td><?php echo $sesion; ?></td>
                                        <td>
                                            <a href="update.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                                            <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                                            <a href="../censoAnimal/Reportes/Propietarios/reportePersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>" class="report" title="generar reporte">Reporte</a>
                                        </td>
                                    </tr>
                        <?php
                                } else {
                                    echo "<td>No existen registros</td>";
                                }
                            }
                        } else {
                            echo ('<p>No se encontraron resultados</p>');
                        }
                        ?>

                    </table>
                </div>

                <div class="container">
                    <table class="table table-striped">
                        <tr>
                            <th>CI Dueño</th>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Sexo</th>
                            <th>Castrado</th>
                            <th>Requiere castración</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <!-- <th>Por</th> -->
                            <th>Acciones</th>
                        </tr>
                        <?php
                        if (isset($_POST["buscar"])) {

                            $buscarci = $_POST['buscar'];
                            $comboSel = $_POST['comboSel'];
                            if ($comboSel == 'ci') {
                                $consultaci = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscar'");

                                // $consultaci = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscar'");
                                while ($fila = mysqli_fetch_array($consultaci)) {

                                    $id = $fila["id"];
                                    $cidueno = $fila["cidueno"];
                                    $nombre = $fila["nombre"];
                                    $especie = $fila["especie"];
                                    $sexo = $fila["sexo"];
                                    $castrado = $fila["castrado"];
                                    $reqcastracion = $fila["reqcastracion"];
                                    $created_at = $fila["CREATED_AT"];
                                    $updated_at = $fila["UPDATED_AT"];
                                    // $sesion = $fila["sesion"];

                        ?>

                                    <tr>

                                        <!-- <td><?php echo $cidueno; ?></td> -->
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $especie; ?></td>
                                        <td><?php echo $sexo; ?></td>
                                        <td><?php echo $castrado; ?></td>
                                        <td><?php echo $reqcastracion; ?></td>
                                        <td><?php echo $created_at; ?></td>
                                        <td><?php echo $updated_at; ?></td>
                                        <td><?php echo $sesion; ?></td>

                                        <td>
                                            <a href="editaranimal.php?id=<?php echo $id; ?>" class="edit" title="Editar">Editar</a>
                                            <a href="borraranimal.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                                        </td>

                            <?php


                                }
                            }
                        } else {
                            echo ('<p>No se encontraron resultados</p>');
                        }
                            ?>
                    </table>
                </div>

            </div>
            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th>Fecha Castración</th>
                        <th>CI Dueño</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre Mascota</th>
                        <th>ID Chip</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Por</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    if (isset($_POST["buscar"])) {
                        $buscar = $_POST['buscar'];
                        $comboSel = $_POST['comboSel'];

                        if ($comboSel == 'idchip') {
                            $consultaid = $conexion->query("SELECT * FROM castracion WHERE idchip = '$buscar'");
                        }else if ($comboSel == 'ci') {
                            $consultaid = $conexion->query("SELECT * FROM castracion WHERE cidueno = '$buscar'");
                            if ($fila1 = mysqli_fetch_array($consultaid)) {

                                $id = $fila1["id"];
                                $fecastracion = $fila1["fecastracion"];
                                $cidueno = $fila1["cidueno"];
                                $nombre = $fila1["nombre"];
                                $apellido = $fila1["apellido"];
                                $nmascota = $fila1["nmascota"];
                                $idchip = $fila1["idchip"];
                                $especie = $fila1["especie"];
                                $sexo = $fila1["sexo"];
                                $created_at = $fila1["CREATED_AT"];
                                $updated_at = $fila1["UPDATED_AT"];
                                $sesion = $fila1['sesion'];
                    ?>
                                <tr>
                                    <td><?php echo $fecastracion; ?></td>
                                    <td><?php echo $cidueno; ?></td>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $apellido; ?></td>
                                    <td><?php echo $nmascota; ?></td>
                                    <td><?php echo $idchip; ?></td>
                                    <td><?php echo $especie; ?></td>
                                    <td><?php echo $sexo; ?></td>
                                    <td><?php echo $created_at; ?></td>
                                    <td><?php echo $updated_at; ?></td>
                                    <td><?php echo $sesion; ?></td>
                                    <td>
                                        <a href="editaranimal.php?id=<?php echo $id; ?>" class="edit" title="Editar">Editar</a>
                                        <a href="borraranimal.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                                    </td>

                                 

                        <?php

                            }
                        }
                    } else {
                        echo ('<p>No se encontraron resultados</p>');
                    }

                        ?>
                </table>
            </div>
    </body>

    </html>

<?php

} else {
    echo header("location: login.php");
}
?>