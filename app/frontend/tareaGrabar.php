<?php
    require_once('libs/db.php');

    function tarea_editar($db, $datos) {

        $id = $datos['id'];
        $descripcion = $datos['descripcion'];
        $estado_id = $datos['estado_id'];

		$sql = 'UPDATE tarea 
                    SET descripcion = ?, estado_id = ?
                    WHERE id = ?';

        $statement = $db->prepare($sql);
        $statement->execute([$descripcion, $estado_id, $id]);
	}  
    
    function tarea_insertar($db, $datos) {

        $descripcion = $datos['descripcion'];
        $estado_id = $datos['estado_id'];

		$sql = 'INSERT INTO tarea (descripcion, estado_id) 
                VALUES (?, ?)';

        $statement = $db->prepare($sql);
        $statement->execute([$descripcion, $estado_id]);
	}     

    function procesar_pedido($db, $request) {
        if (isset($request['id'])) {
            tarea_editar($db, $request);
        } else {
            tarea_insertar($db, $request);
        }
    }
    
    $db = create_connection($config['database']);
    procesar_pedido($db, $_REQUEST);
    header("Location: index.php");