<?php

    class Utls{
        
        public static function deleteSession($name) {
            
            if (isset($_SESSION[$name])){
                $_SESSION[$name] = null;
                unset($_SESSION[$name]);
            }
            
            return $name;
            
        }
        
        public static function isAdm() {
            
            if (!$_SESSION['adm']){
                
                header('Location:'.base_url);
                
            }
            
        }
        
        public static function showCategories(){
            
            require_once 'models/categoria.php';
            $category = new Categoria();
            $categories = $category->getAll();
            //var_dump($caregories);
            return $categories;
            
        }
        
        public static function statsCarrito() {
            
            $stats = array(
                "count" => 0,
                "total" => 0
                
            );
            
            if (isset($_SESSION['carrito'])){
                
                $stats['count'] = count($_SESSION['carrito']);
                
                foreach ($_SESSION['carrito'] as $index => $product) {
                    $stats['total'] = ($product['precio'] * $product['unidades']) + $stats['total'];
                }
                
            }
            
            return $stats;
            
        }
        
    }
    
