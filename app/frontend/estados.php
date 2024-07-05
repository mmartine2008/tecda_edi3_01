<?php   
    require_once('libs/db.php');
    require_once('libs/smarty/Smarty.class.php');


    $db = create_connection($config['database']);
    $estados = estados_recuperar($db);

    if (isset($_REQUEST['mensaje'])) {
        $mensaje = $_REQUEST['mensaje'];
    } else {
        $mensaje = '';
    }

    $smarty = new Smarty();

    $smarty->assign('titulo', 'Gestion de tareas');
    $smarty->assign('estados', $estados);
    $smarty->assign('mensaje', $mensaje);

    $smarty->display('templates/estados.tpl');