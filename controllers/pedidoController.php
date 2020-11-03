<?php

    require_once 'models/pedido.php';

    class pedidoController{
        
        public function index() {
            
            echo 'PEDIDOS';
            
        }
        
        public function make() {
            
            //echo 'CREANDO PEDIDO';
            //var_dump($_SESSION['identity']);
            
            
            require_once 'views/pedido/hacer.php';
            
        }
        
        public function add() {
            
            //var_dump($_POST);
            //var_dump($_SESSION['carrito']);
            //die();
            
            $state = isset($_POST['estado']) && $_POST['estado'] != '' ? $_POST['estado'] : false;
            $city = isset($_POST['ciudad']) && $_POST['ciudad'] != '' ? $_POST['ciudad'] : false;
            $address = isset($_POST['direccion']) && $_POST['direccion'] != '' ? $_POST['direccion'] : false;
            
            $carrito = Utls::statsCarrito();
            
            if ($state && $city && $address){
                
                $order = new Pedido();
                
                //$order->save_product();
                
                $order->setCiudad($city);
                $order->setEstado($state);
                $order->setDireccion($address);
                $order->setUsua_id($_SESSION['identity']->id);
                $order->setCosto($carrito['total']);
                
                if ($order->save() && $order->save_product()){
                    $_SESSION['order'] = 'complete';
                } else {
                    $_SESSION['order'] = 'failed';
                }
                
            } else {
                $_SESSION['order'] = 'failed';
            }
            
            //var_dump($_SESSION['order']);
            //header('Location:'.base_url.'views/pedido/confirm.php');
            header('refresh:1;url=' . base_url . 'pedido/confirm');
        }
        
        public function confirm() {
            
            if (isset($_SESSION['identity'])){
             
                $order = new Pedido();
                $order->setUsua_id($_SESSION['identity']->id);
                $last_order = $order->getOneByUser();
                $order->setId($last_order->id);
                $order_pro = $order->getProductsByOrder();
                $stats = Utls::statsCarrito();
                
            }
            
            require_once 'views/pedido/confirm.php';
            
        }
        
        public function my_orders() {
            
            if (isset($_SESSION['identity'])){
                
                $order = new Pedido();
                $order->setUsua_id($_SESSION['identity']->id);
                $orders = $order->getAllByUser();
                
            }
            
            require_once 'views/pedido/my_orders.php';
            
        }
        
        public function details() {
            
            if (isset($_SESSION['identity'])){
                
                if (isset($_GET['id'])){
                 
                    $order = new Pedido();
                    $order->setId($_GET['id']);
                    $order_pro = $order->getOne();
                    
                    
                    require_once 'views/pedido/detail.php';
                
                } else {
                    
                    header('Location:'.base_url);
                    
                } 
                
            } else {
                
                header('Location:'.base_url);
                
            }
            
        }
        
        public function management() {
            
            Utls::isAdm();
            
            $order = new Pedido();
            $orders = $order->getAllOrders();
            
            require_once 'views/pedido/management.php';
            
        }
        
        public function changestate() {
            
            Utls::isAdm();
            
            if (isset($_GET['id']) && isset($_POST['edo_pedido']) && $_POST['edo_pedido'] != ''){
                
//                var_dump($_GET);
//                var_dump($_POST);
                
                $order = new Pedido();
                $order->setId($_GET['id']);
                $order->setEstado_pedido($_POST['edo_pedido']);
                
                if ($order->updateStatus()){
                    header('Location:'.base_url.'pedido/details&id='.$order->getId());
                } else {
                    header('Location:'.base_url);
                }
                
            }
            

            
        }
        
    }
   


