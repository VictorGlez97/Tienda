<?php

    //require_once '../config/db.php';

    class Usuario{
        
        private $id;
        private $nombre;
        private $apellido;
        private $email;
        private $password;
        private $rol_id;
        private $img;
        private $db;
        
        public function __construct() {
            $this->db = Db::connect();
        }
        
        // GETERS
        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        }

        public function getRol_id() {
            return $this->rol_id;
        }

        public function getImg() {
            return $this->img;
        }

        // SETERS
        public function setId($id) {
            $this->id = $id;
        }

        public function setNombre($nombre) {
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function setApellido($apellido) {
            $this->apellido = $this->db->real_escape_string($apellido);
        }

        public function setEmail($email) {
            $this->email = $this->db->real_escape_string($email);
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setRol_id($rol_id) {
            $this->rol_id = $this->db->real_escape_string($rol_id);
        }

        public function setImg($img) {
            $this->img = $img;
        }

        // FUNCIONES BD
        public function guardar(){
            
            $registro = $this->db->query("INSERT INTO usuarios(nombre, apellido, email, password, rol_id) "
                                       . "VALUE('{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getRol_id()}')");
            
            $enviado = false;
            if ($registro){
                $enviado = true;
            }
         
            return $enviado;
            
        }
        
        public function login(){
            
            $email = $this->email;
            $password = $this->password;
            
            //echo $email .' - '. $password;
            
            // COMPROBAR SI EXISTE EL USUARIO
            //$sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $sql = "SELECT u.id, email, nombre, apellido, password, img, rol FROM usuarios AS u INNER JOIN roles AS r ON r.id = u.rol_id WHERE email = '$email'";
            $login = $this->db->query($sql);
            
            $result = false;
            //var_dump($login);
            
            if ($login && $login->num_rows == 1){
                
                $user = $login->fetch_object();
                
                $verify = password_verify($password, $user->password);
                
                if ($verify){
                    $result = $user;
                }
                
            }
            
            return $result;
            
        }
        
    }
