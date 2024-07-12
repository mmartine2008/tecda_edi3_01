<?php
/* Smarty version 3.1.39, created on 2024-07-12 22:43:02
  from '/var/www/html/frontend/templates/tareas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6691b176665103_37723351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1fb12139500289e659e0831c9098c4e02cf983c' => 
    array (
      0 => '/var/www/html/frontend/templates/tareas.tpl',
      1 => 1720824018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6691b176665103_37723351 (Smarty_Internal_Template $_smarty_tpl) {
?>        <div class="card">
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tareas']->value, 'tarea');
$_smarty_tpl->tpl_vars['tarea']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tarea']->value) {
$_smarty_tpl->tpl_vars['tarea']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['tarea']->value->id;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tarea']->value->descripcion;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tarea']->value->estado;?>
</td>
                    <td>
                            <div class="row">
                                <div class="col-3">
                                    <a href="editar/<?php echo $_smarty_tpl->tpl_vars['tarea']->value->id;?>
" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                </div>
                                <div class="col-3">
                                    <a href="tareaEliminar.php?id=<?php echo $_smarty_tpl->tpl_vars['tarea']->value->id;?>
" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="tarea/nueva" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
            </div>
        </div><?php }
}
