<?php

require_once('config/config.php');

function create_connection() {
    global $config;

    // Atencion: Modificar esto segun la instalacion:
    $host = $config['database']['host'];
    $userName = $config['database']['userName'];
    $password = $config['database']['password'];
    $database = $config['database']['databasename'];
    $port = $config['database']['port'];


    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$database;";
    
        return new PDO($dsn, $userName, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (Exception $e) {
        debug_print_backtrace();
        var_dump($e);
        die(__FILE__.":".__LINE__);
    }

} 

function tareas_recuperar($db) {
    $sql = 'SELECT tarea.*, estado.descripcion as estado 
                FROM tarea
                INNER JOIN estado ON (tarea.estado_id = estado.id)
                ORDER BY tarea.id
                ';
    $stmt = $db->query($sql);
    
    $tareas = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $tareas;
}

function tarea_recuperar($db, $id) {
    $sql = 'SELECT *
                FROM tarea
                WHERE id = ?';

    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $tarea = $stmt->fetch(PDO::FETCH_OBJ);
    return $tarea;     
}

function estados_recuperar($db) {
    $sql = 'SELECT *
                FROM estado';
    $stmt = $db->query($sql);
    
    $tareas = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $tareas;
}

function estado_recuperar($db, $id) {
    $sql = 'SELECT *
                FROM estado
                WHERE id = ?';

    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $tarea = $stmt->fetch(PDO::FETCH_OBJ);
    return $tarea;     
}


function estado_eliminar($db, $id) {
    $sql = 'DELETE FROM estado WHERE id = ?';
    $statement = $db->prepare($sql);
    $statement->execute([$id]);
}   

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

function tareas_eliminar($db, $id) {
    $sql = 'DELETE FROM tarea WHERE id = ?';
    $statement = $db->prepare($sql);
    $statement->execute([$id]);
} 

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

