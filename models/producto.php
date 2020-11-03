<?php

    class Producto{
        
        private $id;
        private $catego_id;
        private $producto;
        private $desc;
        private $precio;
        private $disp;
        private $oferta;
        private $fecha;
        private $img;
        private $db;


        public function __construct() {
            $this->db = DB::connect();
        }
        
        public function getId() {
            return $this->id;
        }

        public function getCatego_id() {
            return $this->catego_id;
        }

        public function getProducto() {
            return $this->producto;
        }

        public function getDesc() {
            return $this->desc;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getDisp() {
            return $this->disp;
        }

        public function getOferta() {
            return $this->oferta;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getImg() {
            return $this->img;
        }

        public function setId($id) {
            $this->id = $this->db->real_escape_string($id);
        }

        public function setCatego_id($catego_id) {
            $this->catego_id = $this->db->real_escape_string($catego_id);
        }

        public function setProducto($producto) {
            $this->producto = $this->db->real_escape_string($producto);
        }

        public function setDesc($desc) {
            $this->desc = $this->db->real_escape_string($desc);
        }

        public function setPrecio($precio) {
            $this->precio = $this->db->real_escape_string($precio);
        }

        public function setDisp($disp) {
            $this->disp = $this->db->real_escape_string($disp);
        }

        public function setOferta($oferta) {
            $this->oferta = $this->db->real_escape_string($oferta);
        }

        public function setFecha($fecha) {
            $this->fecha = $this->db->real_escape_string($fecha);
        }

        public function setImg($img) {
            $this->img = $img;
        }

        public function getAll() {
            
            $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
            return $products;
            
        }
        
        public function getAllCategory() {
            
            $query = "SELECT p.id, p.producto, p.precio, p.img FROM productos AS p "
                    . " INNER JOIN categorias AS c ON p.catego_id = c.id "
                    . " WHERE c.id = '{$this->getId()}' ORDER BY p.id DESC";
                    
            //echo $query;
            
            $products = $this->db->query($query);
            
            return $products;
            
        }
        
        public function save() {
            
            $query = "INSERT INTO productos(id, catego_id, producto, descripcion, precio, disposicion, oferta, fecha, img) "
                                                                    . " VALUES(null, '{$this->catego_id}', '{$this->producto}', "
                                                                    . "'{$this->desc}', {$this->precio}, '{$this->disp}',"
                                                                    . "'{$this->oferta}', CURDATE(), '{$this->img}')";
            $save = $this->db->query($query);
                                                                    
            $result = false;                                                        
            if ($save){
                $result = true;
            }  
            
            return $result;
                                                                  
        }

        public function edit() {
            
            $query = "UPDATE productos SET catego_id = '{$this->catego_id}',  producto = '{$this->producto}', "
                                                        . " descripcion = '{$this->desc}', precio = {$this->precio}, "
                                                        . " disposicion = '{$this->disp}', oferta = '{$this->oferta}' ";
                                                        
            if (!empty($this->img)){
                
                $query .= ", img = '{$this->img}'";
            }     
                                                        
            $query .= " WHERE id = '{$this->id}'";
            
            $edit = $this->db->query($query);
                                                                    
            $result = false;                                                        
            if ($edit){
                $result = true;
            }  
            
            return $result;
                                                                  
        }
        
        public function delete() {
            
            $query = "DELETE FROM productos WHERE id = '{$this->id}'";
            $sql = $this->db->query($query);
            
            $result = false;
            if ($sql){
                $result = true;
            }
            
            return $result;
        }
        
        public function getEditableProduct() {
            
            $query = "SELECT * FROM productos WHERE id = '{$this->id}'";
            $product = $this->db->query($query);
            
            //echo $query;
            //die();
            
            return $product->fetch_object();
        }
        
        public function getRandom() {
            
            $products = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT 3");
            return $products;
            
        }
        
        public function getLatestProducts(){
            
            $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC LIMIT 3");
            return $products;
            
        }
        
    }

