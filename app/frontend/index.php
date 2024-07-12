<?php   
    require_once('libs/db.php');
    require_once('libs/smarty/Smarty.class.php');

    function index() {
 
        $db = create_connection();
        $tareas = tareas_recuperar($db);

        $smarty = new Smarty();

        $smarty->assign('titulo', 'Gestion de tareas');
        $smarty->assign('tareas', $tareas);


        $smarty->display('templates/index.tpl');
    }