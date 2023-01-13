<?php
setlocale(LC_ALL, 'es_UY');
date_default_timezone_set('America/Montevideo');
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'persona';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'ci', 'dt' => 0),
    array('db' => 'nombre',  'dt' => 1),
    array('db' => 'apellido',   'dt' => 2),
    array('db' => 'telefono',     'dt' => 3),
    array('db' => 'direccion',     'dt' => 4),
    array('db' => 'cantanimales',     'dt' => 5),
    array('db' => 'location',     'dt' => 6),
    array('db' => 'zone',     'dt' => 7),
    array(
        'db'        => 'CREATED_AT',
        'dt'        => 8,
        'formatter' => function ($d, $row) {
            return date('d/m/Y g:i a', strtotime($d));
        }
    ),
    array(
        'db'        => 'UPDATED_AT',
        'dt'        => 9,
        'formatter' => function ($d, $row) {
            return date('d/m/Y g:i a', strtotime($d));
        }
    ),
    array('db' => 'sesion',     'dt' => 10),

    array( 
        'db'        => 'id', 
        'dt'        => 11, 
        'formatter' => function( $d, $row ) { 
            return ' 
                <a href="editarPersona.php?id='.$d.'">Editar</a>&nbsp; 
                <a href="borrarPersona.php?id='.$d.'">Borrar</a> &nbsp; 
                <a href="../Reportes/Propietarios/reporteBuspersona.php?id='.$d.'">Reporte</a>
            '; 
        } 
    ) 
    // array( 
    //     'db'        => 'id', 
    //     'dt'        => 11, 
    //     'formatter' => function( $d, $row ) { 
    //         return ' 
    //             <a href="editarPersona.php?id='.$d.'">Editar</a>&nbsp; 
    //             <a href="borrarPersona.php?id='.$d.'">Borrar</a> &nbsp; 
    //             <a href="borrarPersona.php?id='.$d.'">Reporte</a>
    //         '; 
    //     } 
    // ) 
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'censo',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
