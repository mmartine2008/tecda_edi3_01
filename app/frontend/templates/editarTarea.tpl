<html>
{include 'header.tpl'}
<body>
    {include 'navbarTareas.tpl'}
    <div class="container">
    {include 'tareas.tpl'}
        <div class="card mt-4">
            <div class="card-header">
                Lista de Tareas
            </div>
            <h2 class="text-center m-2">Edición de Tarea</h2>
            <!-- Formulario -->
            <form action="tareaGrabar.php?id=<?php echo($tareaEditar->id); ?>" method="POST">
                <!-- Descripcion -->
                <div class="form-group m-4">
                <label for="nombre">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{$tareaEditar->descripcion}" required>
                </div>
                <!-- Estado -->
                <div class="form-group m-4">
                <label for="email">Estado</label>
                    <select class="form-control" id="estado_id" name="estado_id" required>
                        {foreach from=$estados item=estado}
                            {if $estado->id eq $tareaEditar->estado_id}
                                <option selected value="{$estado->id}">{$estado->descripcion}</option>';
                            {else}
                                <option value="{$estado->id}">{$estado->descripcion}</option>';
                            {/if}            
                        {/foreach}
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