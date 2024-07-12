<?php
    require_once('index.php');
    require_once('controlador/TareaController.php');

    $tarea = new TareaController();

    $action = $_REQUEST['action'];
    $parametros = explode('/', $action);

    switch ($parametros[0]) {
        case "tarea": {
            switch ($parametros[1]) {
                case "nueva": $tarea->nueva(); break;
                case "editar": $tarea->editar($parametros[2]); break; 
                case "grabar": ; break; 
                 
            }
        };
        case "estado": {
            switch ($action[1]) {
                case "editar": ; break; 
                case "grabar": ; break; 
                case "nuevo": ; break; 
            }
        }; break;
        case "index": {
            index();
        }; break;
        default : {
            index();
        }; break;        
    }