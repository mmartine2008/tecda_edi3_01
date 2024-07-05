<?php   
    require_once('libs/db.php');
    
    $db = create_connection($config['database']);
    $tareas = tareas_recuperar($db);
    $estados = estados_recuperar($db);
    
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
                    <a class="nav-link" href="tareas">Tareas<span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estados">Estados</a>
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
            </table>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                Lista de Tareas
            </div>
            <h2 class="text-center m-2">Creación de Tarea</h2>
            <!-- Formulario -->
            <form action="tareaGrabar.php" method="POST">
                <!-- Descripcion -->
                <div class="form-group m-4">
                <label for="nombre">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                </div>
                <!-- Estado -->
                <div class="form-group m-4">
                <label for="email">Estado</label>
                    <select class="form-control" id="estado_id" name="estado_id" required>
                        <?php
                            foreach ($estados as $estado) {
                                echo '<option value="'.$estado->id.'">'.$estado->descripcion.'</option>';
                            }
                        ?>
                    </select>
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