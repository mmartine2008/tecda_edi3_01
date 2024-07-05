<?php
/* Smarty version 3.1.39, created on 2024-07-05 22:36:28
  from '/var/www/html/frontend/templates/editarTarea.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6688756c1b0da9_37863026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b245f627aed0ff690ae62b7eb8223f63bd1c5d3' => 
    array (
      0 => '/var/www/html/frontend/templates/editarTarea.tpl',
      1 => 1720218969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navbarTareas.tpl' => 1,
    'file:tareas.tpl' => 1,
  ),
),false)) {
function content_6688756c1b0da9_37863026 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:navbarTareas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
    <?php $_smarty_tpl->_subTemplateRender('file:tareas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="card mt-4">
            <div class="card-header">
                Lista de Tareas
            </div>
            <h2 class="text-center m-2">Edición de Tarea</h2>
            <!-- Formulario -->
            <form action="tareaGrabar.php?id=<?php echo '<?php ';?>
echo($tareaEditar->id); <?php echo '?>';?>
" method="POST">
                <!-- Descripcion -->
                <div class="form-group m-4">
                <label for="nombre">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $_smarty_tpl->tpl_vars['tareaEditar']->value->descripcion;?>
" required>
                </div>
                <!-- Estado -->
                <div class="form-group m-4">
                <label for="email">Estado</label>
                    <select class="form-control" id="estado_id" name="estado_id" required>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['estados']->value, 'estado');
$_smarty_tpl->tpl_vars['estado']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['estado']->value) {
$_smarty_tpl->tpl_vars['estado']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['estado']->value->id == $_smarty_tpl->tpl_vars['tareaEditar']->value->estado_id) {?>
                                <option selected value="<?php echo $_smarty_tpl->tpl_vars['estado']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value->descripcion;?>
</option>';
                            <?php } else { ?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value->descripcion;?>
</option>';
                            <?php }?>            
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
</html><?php }
}
