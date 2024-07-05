{include 'header.tpl' }
<body>
    {if $mensaje == 'OK'}
        <div class="alert alert-success" role="alert">
            Se pudo eliminar correctamente
          </div>
    {elseif $mensaje == 'ERROR'}
        <div class="alert alert-danger" role="alert">
            NO SE PUDO eliminar correctamente!!
        </div>
    {/if}
    {include 'navbarEstados.tpl'}
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
            {foreach from=$estados item=estado} 
                <tr>
                <td>{$estado->id}</td>
                <td>{$estado->descripcion}</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <a href="estadoEditar.php?id={$estado->id}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                            </div>
                            <div class="col-3">
                                <a href="estadoEliminar.php?id={$estado->id}" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            {/foreach}
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="estadoNuevo.php" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
            </div>
        </div>
    </div>
</body>
</html>