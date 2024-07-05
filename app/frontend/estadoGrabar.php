<?php
    require_once('libs/db.php');

    function estado_editar($db, $datos) {

        $id = $datos['id'];
        $descripcion = $datos['descripcion'];
        
		$sql = 'UPDATE estado 
                    SET descripcion = ?
                    WHERE id = ?';

        $statement = $db->prepare($sql);
        $statement->execute([$descripcion, $id]);
	}  
    
    function estado_insertar($db, $datos) {

        $descripcion = $datos['descripcion'];

		$sql = 'INSERT INTO estado (descripcion) VALUES (?)';

        $statement = $db->prepare($sql);
        $statement->execute([$descripcion]);
	}     

    function procesar_pedido($db, $request) {
        if (isset($request['id'])) {
            estado_editar($db, $request);
        } else {
            estado_insertar($db, $request);
        }
    }
    
    $db = create_connection($config['database']);
    procesar_pedido($db, $_REQUEST);
    header("Location: estados.php");