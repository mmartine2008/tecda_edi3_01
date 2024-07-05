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