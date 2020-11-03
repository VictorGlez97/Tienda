<?php

require_once 'models/producto.php';

class carritoController{
    public function index() {
        
        /*if (isset($_SESSION['carrito'])){
            var_dump($_SESSION['carrito']);
        }
        
        echo 'CARRITO CONTROLLER';*/
        
        require_once 'views/carrito/index.php';
    }
    
    public function add() {
        
        if (isset($_GET['id'])){
            $product_id = $_GET['id']; 
        } else {
            header('Location:'.base_url);
        }
        
        if (isset($_SESSION['carrito'])){
            $count = 0;
            foreach ($_SESSION['carrito'] as $index => $element) {
                if ($element['pro_id'] == $product_id){
                    $_SESSION['carrito'][$index]['unidades']++;
                    $count++;
                }
            }
            
        } 
        
        if (!isset($_SESSION['carrito']) || $count == 0){
            
            $product = new Producto();
            $product->setId($product_id);
            $pro = $product->getEditableProduct();
            
            if (is_object($pro)){
            
                $_SESSION['carrito'][$pro->id] = array(
                    "pro_id" => $pro->id,
                    "precio" => $pro->precio,
                    "unidades" => 1,
                    "product" => $pro
                );
                
            }
            
        }
        
        header('Location:'.base_url.'carrito/index');
        
    }
    
    public function delete_all() {
        
        Utls::deleteSession('carrito');
        header('Location:'.base_url.'carrito/index');
        
    }
    
    public function delete_one() {
        
        if (isset($_GET['id'])){
            
            $product_id = $_GET['id'];
            unset($_SESSION['carrito'][$product_id]);
            header('Location:'.base_url.'carrito/index');
            
        }
        
    }
    
    public function up() {
        
        if($_GET['id']){
            
            $product_id = $_GET['id'];
            $_SESSION['carrito'][$product_id]['unidades']++;
            header('Location:'.base_url.'carrito/index');
            
        }
        
    }
    
    public function down() {
        
        if($_GET['id']){
            
            $product_id = $_GET['id']; 
            
            if ($_SESSION['carrito'][$product_id]['unidades'] > 1){
             
                $_SESSION['carrito'][$product_id]['unidades']--;
                
            }
            
            header('Location:'.base_url.'carrito/index');
            
        }
        
    }
    
}
