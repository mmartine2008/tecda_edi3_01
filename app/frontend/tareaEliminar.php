<?php
    require_once('libs/db.php');

    function tareas_eliminar($db, $id) {
		$sql = 'DELETE FROM tarea WHERE id = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
	}    

    $db = create_connection($config['database']);
    $id = $_REQUEST['id'];
    $tareas = tareas_eliminar($db, $id);  
    
    header("Location: index.php");