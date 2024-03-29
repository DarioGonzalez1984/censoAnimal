<?php
include_once('../database.php');
session_start();


if (isset($_SESSION['usuario'])) {
    include ("../header.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tCas').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": '../scripts/server_processing_castracion_table.php',
                    "language": {
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered": "(filtrado desde _MAX_ registros totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "cargando...",
                        "processing": "",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron resultados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    }
                });
            });
        </script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-utilities.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../css/principal.css">
        <link rel="stylesheet" href="../css/header.css">
    <title>Obtener Castraciones</title>
</head>

<body id="bod">

<br>
        <div id="borde" class="border border" style="padding: 20px;">
        <table id= "tCas" class="table table-striped">
            <thead>
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
            </thead>
            <tbody>
                <?php
                    // if (isset($_GET['pageno'])) {
                    //     $pageno = $_GET['pageno'];
                    // } else {
                    //     $pageno = 1;
                    // }
                    // $no_of_records_per_page = 15;
                    // $offset = ($pageno - 1) * $no_of_records_per_page;

                    // $result = $conexion->query("SELECT COUNT(*) FROM castracion");

                    // $total_rows = mysqli_fetch_array($result)[0];
                    // $total_pages = ceil($total_rows / $no_of_records_per_page);

                    // $consulta = $conexion->query("SELECT * FROM castracion LIMIT $offset, $no_of_records_per_page");


                    // while ($fila1 = mysqli_fetch_array($consulta)) {

                    //     $id = $fila1["id"];
                    //     $fecastracion = $fila1["fecastracion"];
                    //     $cidueno = $fila1["cidueno"];
                    //     $nombre = $fila1["nombre"];
                    //     $apellido = $fila1["apellido"];
                    //     $nmascota = $fila1["nmascota"];
                    //     $idchip = $fila1["idchip"];
                    //     $especie = $fila1["especie"];
                    //     $sexo = $fila1["sexo"];
                    //     $created_at = $fila1["CREATED_AT"];
                    //     $updated_at = $fila1["UPDATED_AT"];
                    //     $sesion = $fila1['sesion'];
                    ?>

                <tr>
                    <!-- <td><?php echo $fecastracion; ?></td>
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
                        <a href="editarcastracion.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                        <a href="borrarcastracion.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                    </td>
                </tr> -->

                <?php
                    // }
                    ?>
            </tbody>
            <!-- <tfoot>
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
            </tfoot> -->
        </table>
        </div>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
                <li class="page-item" <?php if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?>>
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno - 1);
                                                } ?>">Anterior</a>
                </li>
                <li class="page-item" <?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?>>
                    <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno + 1);
                                                } ?>">Siguiente</a>
                </li>
                <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
            </ul>
        </nav> -->
</body>
</html>
<?php

} else {
    echo header("location: login.php");
}
?>