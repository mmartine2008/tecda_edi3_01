<?php
    require_once('modelos/TareaModel.php');
    require_once('modelos/EstadoModel.php');
    require_once('libs/smarty/Smarty.class.php');

    class TareaController {
        private $smarty = null;
        private $tareaModel;
        private $estadoModel;
        
        function __construct() {
            $tareaModel = new TareaModel();
            $estadoModel = new EstadoModel();
            $smarty = new Smarty();
        }

        function nueva() {
            $tareas = $this->tareaModel->todas();        
            $estados = $this->estadoModel->todos();
    
            $this->smarty->assign('titulo', 'Gestion de tareas');
            $this->smarty->assign('tareas', $tareas);
            $this->smarty->assign('estados', $estados);
        
            $this->smarty->display('templates/nuevaTarea.tpl');    
       
        }

        function grabar() {
            function procesar_pedido($db, $request) {
                if (isset($request['id'])) {
                    tarea_editar($db, $request);
                } else {
                    tarea_insertar($db, $request);
                }
            }
            
            $db = create_connection($config['database']);
            procesar_pedido($db, $_REQUEST);
            header("Location: index.php");            
        }
    
        function editar () {

            $tareas = $this->tareaModel->todas();        
            $estados = $this->estadoModel->todos();
            $id = $_REQUEST['id'];
            $tareaEditar = $this->tareaModel->una($id);
        
            $this->smarty->assign('titulo', 'Gestion de tareas');
            $this->smarty->assign('tareas', $tareas);
            $this->smarty->assign('id', $id);
            $this->smarty->assign('tareaEditar', $tareaEditar);
            $this->smarty->assign('estados', $estados);
        
            $this->smarty->display('templates/editarTarea.tpl');
        }

        function eliminar() {
            $id = $_REQUEST['id'];
            $tareas = $this->tareaModel->eliminar($id);  
            
            header("Location: index.php");            
        }

    }