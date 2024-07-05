<?php
/* Smarty version 3.1.39, created on 2024-07-05 22:50:28
  from '/var/www/html/frontend/templates/estados.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_668878b40d7928_64100901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a452386ff686fa787b4860c9438977c8d0303fd' => 
    array (
      0 => '/var/www/html/frontend/templates/estados.tpl',
      1 => 1720219797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navbarEstados.tpl' => 1,
  ),
),false)) {
function content_668878b40d7928_64100901 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
    <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == 'OK') {?>
        <div class="alert alert-success" role="alert">
            Se pudo eliminar correctamente
          </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['mensaje']->value == 'ERROR') {?>
        <div class="alert alert-danger" role="alert">
            NO SE PUDO eliminar correctamente!!
        </div>
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender('file:navbarEstados.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estados']->value, 'estado');
$_smarty_tpl->tpl_vars['estado']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['estado']->value) {
$_smarty_tpl->tpl_vars['estado']->do_else = false;
?> 
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['estado']->value->id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estado']->value->descripcion;?>
</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <a href="estadoEditar.php?id=<?php echo $_smarty_tpl->tpl_vars['estado']->value->id;?>
" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Editar</a>
                            </div>
                            <div class="col-3">
                                <a href="estadoEliminar.php?id=<?php echo $_smarty_tpl->tpl_vars['estado']->value->id;?>
" type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion()"><i class="fas fa-trash-alt"></i>Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="estadoNuevo.php" type="button" class="btn btn-success btn-block"><i class="fas fa-add"></i>Agregar</a>
            </div>
        </div>
    </div>
</body>
</html><?php }
}
