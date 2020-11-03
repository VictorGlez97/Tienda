<?php

require_once 'models/producto.php';

class productoController {

    public function index() {

        $product = new Producto();
        $new_products = $product->getLatestProducts();
        $season_products = $product->getRandom();
        $sell_products = $product->getRandom();
        
        //echo 'PRODUCTO';
        require_once 'views/producto/productos.php';
    }

    public function management() {

        Utls::isAdm();

        $clothe = new Producto();
        $clothes = $clothe->getAll();
        //var_dump($clothes);

        require_once 'views/producto/management.php';
    }
    
    public function view() {
        
        if ($_GET['id']){
            
            $id = $_GET['id'];

            $products = new Producto();
            $products->setId($id);
            $pro = $products->getEditableProduct();            
        
            require_once 'views/producto/ver.php';
        }
        
    }

    public function create() {

        Utls::isAdm();
        require_once 'views/producto/create.php';
    }

    public function save() {

        Utls::isAdm();
        
        if (isset($_POST)) {

            $products = new Producto();

            $product = isset($_POST['product']) ? $_POST['product'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            $disp = isset($_POST['disp']) ? $_POST['disp'] : false;
            $desc = isset($_POST['desc']) ? $_POST['desc'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $bargain = isset($_post['bargain']) ? $_POST['bargain'] : false;

            $img = isset($_FILES['img']) ? $_FILES['img'] : false;
            
            $filename = $img['name'];
            $mimetype = $img['type'];
            
            if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){
                
                if (!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }
                
                move_uploaded_file($img['tmp_name'], 'uploads/images/'.$filename);
                //$products->setImg($filename);
                
            }
            
            if ($product && $category && $disp && $price){
                
                $products->setProducto($product);
                $products->setCatego_id($category);
                $products->setDisp($disp);
                $products->setDesc($desc);
                $products->setPrecio($price);
                $products->setOferta($bargain);
                $products->setImg($filename);

                if ($products->save()) {
                    $_SESSION['product'] = 'complete';
                    //echo '<h3 style="color: green; text-align: center;"> PRODUCTO ' . $product . ' GUARDADA CORRECTAMENTE </h3>';
                } else {
                    $_SESSION['product'] = 'failed';
                    //echo '<h3 style="color: red; text-align: center;"> ERROR: PRODUCTO ' . $product . ' NO FUE GUARDAD@ </h3>';
                }
                
            } else {
                $_SESSION['product'] = 'failed';
                //echo '<h3 style="color: red; text-align: center;"> ERROR: HACEN FALTA DATOS EN EL FORMULARIO </h3>';
            }

            $_SESSION['p'] = $product;
            header("Location:". base_url ."producto/management");
        }
    }
    
    public function edit() {
        
        Utls::isAdm();
        //var_dump($_GET);
        if ($_GET['id']){
            
            $edit = true;
            $id = $_GET['id'];

            $products = new Producto();
            $products->setId($id);
            $pro = $products->getEditableProduct();            
        
            require_once 'views/producto/create.php';
        }
        
        
    }
    
    public function update() {
            
            if ($_GET['id']){
                
                $products = new Producto();
                
                $id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : false;
                $product = isset($_POST['product']) ? $_POST['product'] : false;
                $category = isset($_POST['category']) ? $_POST['category'] : false;
                $disp = isset($_POST['disp']) ? $_POST['disp'] : false;
                $desc = isset($_POST['desc']) ? $_POST['desc'] : false;
                $price = isset($_POST['price']) ? $_POST['price'] : false;
                $bargain = isset($_post['bargain']) ? $_POST['bargain'] : false;
                $img = isset($_FILES['img']) ? $_FILES['img'] : false;

                if ($id){
                    
                    if ($img){
                        
                        $filename = $img['name'];
                        $mimetype = $img['type'];
                        $products->setId($id);
                        $pro = $products->getEditableProduct();
                        
                        if (!is_null($pro->img)){
                            
                            $url_del = base_url."uploads/images/".$pro->img;
                            //chmod(unlink($url_del), 0771);
                            //unlink($url_del);
                            //die();
                        }
                        
                        if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){
                
                            if (!is_dir('uploads/images')){
                                mkdir('uploads/images', 0777, true);
                            }

                            move_uploaded_file($img['tmp_name'], 'uploads/images/'.$filename);
                            $products->setImg($filename);

                        }
                        
                    }
                    
                    if ($category && $product && $price && $disp){
                        
                        $products->setProducto($product);
                        $products->setCatego_id($category);
                        $products->setDisp($disp);
                        $products->setDesc($desc);
                        $products->setOferta($bargain);
                        $products->setPrecio($price);
                        
                        if ($products->edit()){
                            $_SESSION['edit_product'] = 'complete';
                        } else {
                            $_SESSION['edit_product'] = 'failed';
                        }
                        
                    } else {
                        
                        $_SESSION['edit_product'] = 'failed';
                    }
                    
                } else {
                    
                    $_SESSION['edit_product'] = 'failed';
                }
                
            } 
            
            header("Location:". base_url ."producto/management");
        }
    
    public function delete() {
        
        //var_dump($_GET);
        Utls::isAdm();
        
        if (isset($_GET['id'])){
            
            $products = new Producto();
            $products->setId($_GET['id']);
            
            if ($products->delete()){
            
                $_SESSION['del_product'] = 'complete';
            } else {
                
                $_SESSION['del_product'] = 'falied';
            }
            
        } else {
            
            $_SESSION['failed'];
        }
        
        header("Location:". base_url ."producto/management");
    }

}
