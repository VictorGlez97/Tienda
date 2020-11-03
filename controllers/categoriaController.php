<?php

    require_once 'models/categoria.php';
    require_once 'models/producto.php';

    class categoriaController{
        
        public function index() {
            
            Utls::isAdm();
            $category = new Categoria();
            $categories = $category->getAll();
            //echo 'CATEGORIA';
            
            require_once 'views/categoria/index.php';            
        }
        
        public function ver(){
            
            //echo 'CATEGORIAS';
            if (isset($_GET['id'])){
                
                $categories = new Categoria();
                $categories->setId($_GET['id']);
                $category = $categories->getOne();
                
                $products = new Producto();
                $products->setId($_GET['id']);
                $pro = $products->getAllCategory();
                
                require_once 'views/categoria/ver.php';
            }
            
        }

        public function create() {
            
            Utls::isAdm();
            require_once 'views/categoria/create.php';
            
        }
        
        public function save() {
            
            Utls::isAdm();
            
            $categories = new Categoria();
            
            if (isset($_POST)){
           
                $category = isset($_POST['category']) ? $_POST['category'] : false; 
                        
                $categories->setCategoria($category);
                
                if ($categories->save()){
                    
                    echo '<h3 style="color: green; text-align: center;"> CATEGORIA '. $category .' GUARDADA CORRECTAMENTE </h3>';
                    
                } else {
                    
                    echo '<h3 style="color: red; text-align: center;"> ERROR: CATEGORIA '. $category .' NO FUE GUARDAD@ </h3>';
                    
                }
                
            }
            
            header("refresh:1,url=". base_url ."categoria/index");
            
        }
        
    }

