<?php
/* Smarty version 3.1.39, created on 2024-07-05 22:49:43
  from '/var/www/html/frontend/templates/navbarEstados.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66887887bcd9d3_62616229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f13be2a57075ae2078ebaed30d4b66f66672fc4' => 
    array (
      0 => '/var/www/html/frontend/templates/navbarEstados.tpl',
      1 => 1720219410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66887887bcd9d3_62616229 (Smarty_Internal_Template $_smarty_tpl) {
?>    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Tareas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estados.php">Estados<span class="sr-only">(actual)</span></a>
                </li>
            </ul>
        </div>
    </nav><?php }
}
