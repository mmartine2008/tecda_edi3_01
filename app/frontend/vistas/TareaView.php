<?php
    require_once('libs/smarty/Smarty.class.php');

    class TareaView {
        private $smarty = null;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function nueva($tareas, $estados) {

            $this->smarty->assign('titulo', 'Gestion de tareas');
            $this->smarty->assign('tareas', $tareas);
            $this->smarty->assign('estados', $estados);
        
            $this->smarty->display('templates/nuevaTarea.tpl');    
        }

        function editar($tareas, $id, $tareaEditar, $estados) {
            $this->smarty->assign('titulo', 'Gestion de tareas');
            $this->smarty->assign('tareas', $tareas);
            $this->smarty->assign('id', $id);
            $this->smarty->assign('tareaEditar', $tareaEditar);
            $this->smarty->assign('estados', $estados);
        
            $this->smarty->display('templates/editarTarea.tpl');

        }

    }