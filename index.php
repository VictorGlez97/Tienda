<?php
    session_start();
    require_once 'autoload.php';
    require_once 'config/db.php';
    require_once 'helpers/utls.php';
    require_once 'config/parameters.php';
    require_once 'views/layout/header.php';
    require_once 'views/layout/sidebar.php';

    // CONEXION BD
    //$Db = Db::connect();
    
    //var_dump($_SESSION);
    
    function show_error(){
        $error = new errorController();
        $error->index();
    }

    if (isset($_GET['controlador'])) {
        $nombre_controlador = $_GET['controlador'] . 'Controller';
        //var_dump($nombre_controlador);
        //echo $nombre_controlador;
    } elseif (!isset($_GET['controlador']) && !isset($_GET['accion'])){
        
        $nombre_controlador = controller_default;
        
    } else {
        //echo ':(';
        show_error();
        exit();
    }

    if (class_exists($nombre_controlador)) {

        $controlador = new $nombre_controlador();

        //var_dump($controlador);
        
        if (isset($_GET['accion']) && method_exists($controlador, $_GET['accion'])) {
            
            $accion = $_GET['accion'];
            $controlador->$accion();
            
        } elseif(!isset($_GET['accion'])){
            
            $accion = action_default;
            $controlador->$accion();
            
        } else {
            
            //echo ':(';
            show_error();   
        
        }
    } else {
        
        show_error();
        
    }

    require_once 'views/layout/footer.php';
