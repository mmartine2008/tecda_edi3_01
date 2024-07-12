<?php
    require_once('modelos/TareaModel.php');
    require_once('vistas/TareaView.php');
    require_once('modelos/EstadoModel.php');
    require_once('libs/smarty/Smarty.class.php');

    class TareaController {
        private $smarty = null;
        private $tareaModel;
        private $estadoModel;
        
        function __construct() {
            $this->tareaModel = new TareaModel();
            $this->estadoModel = new EstadoModel();
            $this->view = new TareaView();
            $this->smarty = new Smarty();
        }

        function nueva() {
            $tareas = $this->tareaModel->todas();        
            $estados = $this->estadoModel->todos();
            
            $this->view->nueva($tareas, $estados);
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
    
        function editar ($id) {

            $tareas = $this->tareaModel->todas();        
            $estados = $this->estadoModel->todos();
            $tareaEditar = $this->tareaModel->una($id);
        
            $this->view->editar($tareas, $id, 
                        $tareaEditar, $estados);
        }

        function eliminar() {
            $id = $_REQUEST['id'];
            $tareas = $this->tareaModel->eliminar($id);  
            
            header("Location: index.php");            
        }

    }