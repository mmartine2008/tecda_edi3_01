<?php   
    require_once('libs/db.php');
    require_once('libs/smarty/Smarty.class.php');

    $db = create_connection($config['database']);
    $tareas = tareas_recuperar($db);
    $estados = estados_recuperar($db);
    $id = $_REQUEST['id'];
    $tareaEditar = tarea_recuperar($db, $id);

    $smarty = new Smarty();

    $smarty->assign('titulo', 'Gestion de tareas');
    $smarty->assign('tareas', $tareas);
    $smarty->assign('id', $id);
    $smarty->assign('tareaEditar', $tareaEditar);
    $smarty->assign('estados', $estados);

    $smarty->display('templates/editarTarea.tpl');