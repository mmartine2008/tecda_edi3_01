<?php   
    require_once('libs/smarty/Smarty.class.php');
    require_once('modelos/TareaModel.php');

    function index() {

        $tareaModel = new TareaModel();

        $tareas = $tareaModel->todas();

        $smarty = new Smarty();

        $smarty->assign('titulo', 'Gestion de tareas');
        $smarty->assign('tareas', $tareas);


        $smarty->display('templates/index.tpl');
    }