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
            {foreach from=$tareas item=$tarea}
                <tr>
                    <td>{$tarea->id}</td>
                    <td>{$tarea->descripcion}</td>
                    <td>{$tarea->estado}</td>
                    <td>
                            <div class="row">
                                <div class="col-3">
                                    <a href="tareaEditar.php?id={$tarea->id}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                </div>
                                <div class="col-3">
                                    <a href="tareaEliminar.php?id={$tarea->id}" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
            {/foreach}
            </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="tareaNueva.php" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
            </div>
        </div>