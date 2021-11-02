<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    //setters
    function setRol($rol){
        $this->rol = $this->db->real_escape_string($rol);
    }
    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    function setId($id){
        $this->id = $this->db->dreal_escape_string($id);
    }
    function setPassword($password){
        $this->password = $password; 
    }

    /*setters*/
    function getId(){
       return $this->id;
    }
    function getEmail(){
       return $this->email;
    }
    function getRol(){
       return $this->rol;
    }
    function getPassword(){
       return $this->password = password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]); 
    }
    public function saveDate(){
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getEmail()}','{$this->getPassword()}', NULL);";
        $save = $this->db->query($sql);
        $result = 'false';
        if($save){
            $result = 'true';
        }
        return $result;
    }
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            $verify = password_verify($password, $usuario->password);
        if($verify){
            $result = $usuario;
            }
        }
        return $result;
    }
}
?>