<?php

    class Pedido{
        
        private $id;
        private $usua_id;
        private $estado;
        private $ciudad;
        private $direccion;
        private $costo;
        private $estado_pedido;
        private $fecha;
        private $hora;
        private $db;
        
        public function __construct() {
            $this->db = Db::connect();
        }
        
        public function getId() {
            return $this->id;
        }

        public function getUsua_id() {
            return $this->usua_id;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getCiudad() {
            return $this->ciudad;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getCosto() {
            return $this->costo;
        }

        public function getEstado_pedido() {
            return $this->estado_pedido;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getHora() {
            return $this->hora;
        }

        public function setId($id) {
            $this->id = $this->db->real_escape_string($id);
        }

        public function setUsua_id($usua_id) {
            $this->usua_id = $this->db->real_escape_string($usua_id);
        }

        public function setEstado($estado) {
            $this->estado = $this->db->real_escape_string($estado);
        }

        public function setCiudad($ciudad) {
            $this->ciudad = $this->db->real_escape_string($ciudad);
        }

        public function setDireccion($direccion) {
            $this->direccion = $this->db->real_escape_string($direccion);
        }

        public function setCosto($costo) {
            $this->costo = $this->db->real_escape_string($costo);
        }

        public function setEstado_pedido($estado_pedido) {
            $this->estado_pedido = $this->db->real_escape_string($estado_pedido);
        }

        public function setFecha($fecha) {
            $this->fecha = $this->db->real_escape_string($fecha);
        }

        public function setHora($hora) {
            $this->hora = $this->db->real_escape_string($hora);
        }

        public function save() {
            
            $query = "INSERT INTO pedidos VALUES(NULL, '{$this->getUsua_id()}', '{$this->getEstado()}', "
                                                . "'{$this->getCiudad()}', '{$this->getDireccion()}', "
                                                . "'{$this->getCosto()}', 'CONFIRMADO', CURDATE(), CURTIME())";
                                                
            $sql = $this->db->query($query);
            
            //echo $query .'<br/>';
            //echo $sql;
            //die();
            
            $result = false;
            if ($sql){
                $result = true;
            }
                 
            return $result;
        }
        
        public function save_product() {
            
            $query = "SELECT LAST_INSERT_ID() AS 'pedido'";
            $sql = $this->db->query($query);
            $pedido_id = $sql->fetch_object()->pedido;
            
            //var_dump($_SESSION['carrito']);
            //die();
            
            foreach ($_SESSION['carrito'] as $product) {
                //$pro = $product['product'];
                
                $query = "INSERT INTO pedido_producto VALUES(NULL, '{$pedido_id}', '{$product['pro_id']}', '{$product['unidades']}')";
                $sql = $this->db->query($query);
            }
            
            $result = false;
            if ($sql){
                $result = true;
            }
            
            return $result;
        }
        
        public function getOneByUser() {
            
            $query = "SELECT p.id, p.costo FROM pedidos AS p INNER JOIN "
                    . "pedido_producto AS pp ON pp.pedido_id = p.id "
                    . "WHERE usua_id = '{$this->getUsua_id()}' "
                    . "ORDER BY p.id DESC LIMIT 1";
            
            //echo $query;
            //die();
            
            $sql = $this->db->query($query);
            
            return $sql->fetch_object();
            
        }
        
        public function getAllByUser() {
            
            $query = "SELECT * FROM pedidos WHERE usua_id = '{$this->getUsua_id()}'";
            
            $sql = $this->db->query($query);
            
            return $sql;
            
        }
        
        public function getAllOrders() {
            
            $query = "SELECT p.id, u.email, p.direccion, p.costo, p.fecha, p.estado_pedido "
                    . "FROM pedidos AS p INNER JOIN usuarios AS u ON u.id = p.usua_id";
            
            $sql = $this->db->query($query);
            
            return $sql;
            
        }
        
        public function getOne() {
            
            $query = "SELECT pro.img, pro.producto, pro.precio, pp.unidades, p.direccion, p.costo, p.ciudad, p.estado, p.estado_pedido "
                    . "FROM pedidos AS p "
                    . "INNER JOIN pedido_producto AS pp ON pp.pedido_id = p.id "
                    . "INNER JOIN productos AS pro ON pro.id = pp.producto_id "
                    . "WHERE pp.pedido_id = '{$this->getId()}'";
                    
            //echo $query;
            //die();
                   
            $sql = $this->db->query($query);
            
            return $sql;
            
        }
        
        public function getProductsByOrder() {
            
            $query = "SELECT pro.img, pro.producto, pro.precio, pp.unidades FROM pedido_producto AS pp "
                    . "INNER JOIN productos AS pro ON pp.producto_id = pro.id "
                    . "WHERE pp.pedido_id = '{$this->getId()}'";
            
            $sql = $this->db->query($query);
            
            return $sql;
        }
        
        public function updateStatus() {
            
            $query = "UPDATE pedidos SET estado_pedido = '{$this->getEstado_pedido()}' WHERE id = '{$this->getId()}'";
            
            $sql = $this->db->query($query);
            
            $result = false;
            if ($sql){
                $result = true;
            }
            
            return $result;
            
        }
        
    }
