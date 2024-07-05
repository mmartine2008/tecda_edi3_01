<?php   
    require_once('libs/db.php');
    

    $db = create_connection($config['database']);
    $estados = estados_recuperar($db);
    $id = $_REQUEST['id'];
    $estadoEditar = estado_recuperar($db, $id);

    
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
            <li class="nav-item ">
                    <a class="nav-link" href="index.php">Tareas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="estados.php">Estados<span class="sr-only">(actual)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
                <div class="card-header">
                    Lista de Estados
                </div>
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
                <?php 
                    foreach ($estados as $estado) {
                        echo "<tr>";
                        echo "<td>".$estado->id."</td>";
                        echo "<td>".$estado->descripcion."</td>";
                        echo '<td>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="estadoEditar.php?id='.$estado->id.'" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="estadoEliminar.php?id='.$estado->id.'" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                                    </div>
                                </div>
                            </td>';
                        echo "</tr>";
                    }
                ?>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="estadoNuevo.php" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
                </div>
            </div>

        <div class="card m-4">
            <div class="card-header">
                Editar Estado
            </div>
            <!-- Formulario -->
            <form action="estadoGrabar.php?id=<?php echo($estadoEditar->id); ?>" method="POST">
                <!-- Descripcion -->
                <div class="form-group m-4">
                <label for="nombre">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo($estadoEditar->descripcion); ?>" required>
                </div>

                <!-- Tarea -->
                <!-- Botón de enviar -->
                <div class="form-group m-4">
                    <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>