<?php

    class Categoria{
        
        private $id;
        private $categoria;
        private $db;
        
        public function __construct() {
            $this->db = DB::connect();
        }
        
        public function getId() {
            return $this->id;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function setId($id) {
            $this->id = $this->db->real_escape_string($id);
        }

        public function setCategoria($categoria) {
            $this->categoria = $this->db->real_escape_string($categoria);
        }

        public function getAll() {
            
            $categories = $this->db->query("SELECT * FROM categorias ORDER BY id");
            return $categories;
            
        }
        
        public function getOne() {
            
            $categories = $this->db->query("SELECT * FROM categorias WHERE id = '{$this->getId()}'");
            return $categories->fetch_object();
            
        }

                public function save() {
            
            $categories = $this->db->query("SELECT * FROM categorias WHERE categoria = '{$this->getCategoria()}'");
            $result = false;
            //var_dump($categories);
            
            if ($categories->num_rows == 0){
            
                $category = $this->db->query("INSERT INTO categorias(categoria) VALUES('{$this->getCategoria()}')");

                if ($category){

                    $result = true;

                }
                
            }
            
            return $result;
        }
        
    }
