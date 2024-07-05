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

    function tareas_eliminar($db, $id) {
		$sql = 'DELETE FROM tarea WHERE id = ?';
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
	}    

    $db = create_connection($config['database']);
    $id = $_REQUEST['id'];
    $tareas = tareas_eliminar($db, $id);  
    
    header("Location: index.php");