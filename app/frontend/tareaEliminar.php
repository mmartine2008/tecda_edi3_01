<?php
    require_once('libs/db.php');
   

    $db = create_connection($config['database']);
    $id = $_REQUEST['id'];
    $tareas = tareas_eliminar($db, $id);  
    
    header("Location: index.php");