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

    $db = create_connection($config['database']);
    $tareas = tareas_recuperar($db);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menú Horizontal con Bootstrap</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/utils.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Tareas<span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estados.php">Estados</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Lista de Tareas
            </div>
            <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>      
            </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($tareas as $tarea) {
                    echo "<tr>";
                    echo "<td>".$tarea->id."</td>";
                    echo "<td>".$tarea->descripcion."</td>";
                    echo "<td>".$tarea->estado."</td>";
                    echo '<td>
                            <div class="row">
                                <div class="col-3">
                                    <a href="tareaEditar.php?id='.$tarea->id.'" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                </div>
                                <div class="col-3">
                                    <a href="tareaEliminar.php?id='.$tarea->id.'" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                                </div>
                            </div>
                        </td>';
                    echo "</tr>";
                }
            ?>
            </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="tareaNueva.php" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
            </div>
        </div>
    </div>
</body>
</html>