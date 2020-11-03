<?php

    require_once 'models/usuario.php';

    class usuarioController{
        
        public function index(){
            
            echo "USUARIOS";
            
        }
        
        public function registro(){
            
            require_once 'views/usuario/registro.php';
            
        }
        
        public function guardar(){
            
            if($_POST){
                
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
                $correo = isset($_POST['correo']) ? $_POST['correo'] : false;
                $pass = isset($_POST['pass']) ? $_POST['pass'] : false;
                $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
                
                //var_dump($_POST);
                if ($nombre && $apellido && $correo && $pass && $rol){
                
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellido($apellido);
                    $usuario->setEmail($correo);
                    $usuario->setPassword($pass);
                    $usuario->setRol_id($rol);

                    if ($usuario->guardar()){

                        $_SESSION['register'] = "complete";

                    } else {

                        $_SESSION['register'] = "fail";

                    }
                } else {
                    
                    $_SESSION['register'] = "fail";
                    
                }
                
            } else {
                
                echo '<h3> ERROR: REGISTRO NO GUARDADO </h3>';
                $_SESSION['register'] = "fail";
                
            }
            
            header('refresh:1;url=' . base_url . '/usuario/registro');
            
        }
        
        public function login() {
            
            if (isset($_POST)){
                
                $user_class = new Usuario();
                $user_class->setEmail($_POST['email']);
                $user_class->setPassword($_POST['pass']);
                $user = $user_class->login();
                
                //var_dump($user);
                //die();
                
                if ($user && is_object($user)){
                    
                    $_SESSION['identity'] = $user;
                    
                    if ($user->rol == 'adm'){
                        
                        $_SESSION['adm'] = true;
                        echo '<h3 style="color: green; text-align: center;"> BIENVENIDO ADM </h3>';
                        
                    } else {
                        
                        echo '<h3 style="color: green; text-align: center;"> BIENVENIDO </h3>';
                        
                    }
                    
                } else {
                    
                    $_SESSION['fail_login'] = 'ERROR DE IDENTIFICACIÓN';
                    
                }
                
            }
            
            header('refresh:1;url=' . base_url);
            
        }
        
        public function logout(){
            
            if (isset($_SESSION['identity'])){
                unset($_SESSION['identity']);
                //session_destroy();
            }
            
            if (isset($_SESSION['adm'])){
                unset($_SESSION['adm']);
            }
            
            echo '<h3 style="color: blue; text-align: center;"> CERRANDO SESIÓN </h3>';
            header('refresh:1;url='.base_url);
            
        }
        
    }

