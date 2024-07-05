<?php
/* Smarty version 3.1.39, created on 2024-07-05 22:28:03
  from '/var/www/html/frontend/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66887373b00b43_22821960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae39b24c68925f2c17923fc676028d413fcbc8b2' => 
    array (
      0 => '/var/www/html/frontend/templates/index.tpl',
      1 => 1720218473,
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
function content_66887373b00b43_22821960 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:navbarTareas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
    <?php $_smarty_tpl->_subTemplateRender('file:tareas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</body>
</html><?php }
}
