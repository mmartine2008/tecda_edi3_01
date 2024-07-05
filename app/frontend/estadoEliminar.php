<?php
    require_once('libs/db.php');

    function estado_eliminar($db, $id) {
		$sql = 'DELETE FROM estado WHERE id = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
	}    

    $db = create_connection($config['database']);
    $id = $_REQUEST['id'];

    try {
        $tareas = estado_eliminar($db, $id);  
        $mensaje = 'OK';
    } catch (\Throwable $th) {
        $mensaje = 'ERROR';
    }

    header('Location: estados.php?mensaje='.$mensaje);