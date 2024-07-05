<?php
    $config = [];
    $config['database']['host'] = 'pgdb';
    $config['database']['userName'] = 'postgres';
    $config['database']['password'] = 'postgres';
    $config['database']['databasename'] = 'tareas';
    $config['database']['port'] = '5432';

    function create_connection($baseConfig) {

        $config = $baseConfig;

        // Atencion: Modificar esto segun la instalacion:
        $host = $config['host'];
        $userName = $config['userName'];
        $password = $config['password'];
        $database = $config['databasename'];
        $port = $config['port'];


        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$database;";
        
            return new PDO($dsn, $userName, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        } catch (Exception $e) {
            debug_print_backtrace();
            var_dump($e);
            die(__FILE__.":".__LINE__);
        }

    } 

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