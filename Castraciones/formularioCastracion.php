<?php
session_start();


if (isset($_SESSION['usuario'])) {
include('../header.php');
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

        <!-- <script>
            $(document).ready(function() {
                $('#tUsers').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'scripts/server_processing.php',
                });
            }); -->
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
        <title>Obtener animales</title>

        <title>Ingresar Castración</title>
    </head>

    <body id="bod">
       

            <br>
            <div class="container-fluid" style="width:650px">


                <form method="post" action="agregarCastracion.php">

                    <div id="borde" class="border border" style="padding: 20px;">
                        <h1><strong> Datos de castración</strong></h1>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="date" placeholder="" class="form-control" name="fecastracion" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="CI del dueño" class="form-control" name="ciduenoC" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Nombre" class="form-control" name="nombreC" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Apellido" class="form-control" name="apellidoC" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Nombre de la mascota" class="form-control" name="nmascota" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Id chip" size="23" maxlength="23" minlength="23" class="form-control" name="idchip" required="true" />
                        </div>
                     
                        <table class="table table-responsive">
                            <th>
                                <label for="especie">Especie:</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Perro" name="especieC" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Gato" name="especieC" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Gato
                                    </label>
                                </div>
                               
                            </th>
                            <th>
                                <label for="especie">Sexo:</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Macho" name="sexoC" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Macho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Hembra" name="sexoC" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hembra
                                    </label>
                                </div>
                                <br>
                            </th>
                        </table>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
    </body>
    </html>
<?php
} else {
    echo header("location: login.php");
}

?>