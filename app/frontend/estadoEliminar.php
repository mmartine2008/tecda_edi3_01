<?php
    require_once('libs/db.php');
 

    $db = create_connection($config['database']);
    $id = $_REQUEST['id'];

    try {
        $tareas = estado_eliminar($db, $id);  
        $mensaje = 'OK';
    } catch (\Throwable $th) {
        $mensaje = 'ERROR';
    }

    header('Location: estados.php?mensaje='.$mensaje);