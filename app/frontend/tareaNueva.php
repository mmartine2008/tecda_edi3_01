<?php   
    require_once('libs/db.php');
    require_once('libs/smarty/Smarty.class.php');
    
    function tarea_nueva() {
        $db = create_connection();
        $tareas = tareas_recuperar($db);
        $estados = estados_recuperar($db);
     
        $smarty = new Smarty();
    
        $smarty->assign('titulo', 'Gestion de tareas');
        $smarty->assign('tareas', $tareas);
        $smarty->assign('estados', $estados);
    
        $smarty->display('templates/nuevaTarea.tpl');    
    
    }
