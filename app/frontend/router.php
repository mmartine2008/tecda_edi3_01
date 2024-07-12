<?php
    require_once('index.php');
    require_once('tareaNueva.php');

    $action = $_REQUEST['action'];
    $parametros = explode('/', $action);

    switch ($parametros[0]) {
        case "tarea": {
            switch ($parametros[1]) {
                case "nueva": tarea_nueva(); break;
                case "editar": ; break; 
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