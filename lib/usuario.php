<?php
  class Usuario{
    private $id_usu;
    private $email;
    private $pass_usu;
    private $tipo_usuario;
    private $nombre;
    private $nombre_usuario;


    function __construct($email,$pass_usu){
      $this->email = $email;
      $this->pass_usu = $pass_usu;
     
    }
   
   //Metodos para conseguir los datos que quiera
    function getEmail(){
      return $this->email;
    }

    function getpass_usu(){
      return $this->pass_usu;
    }

    function gettipo_usu(){
      return $this->tipo_usu;
    }
    function getID(){
      return $this->id_usu;
    }
    function getNombre(){
  
      return $this->nombre;
      
    }
    function getnombre_usu(){
      return $this->nombre_usuario;
    }
     //Metodos para asignar los datos que quiera
    function setID($id_usu){
      $this->id_usu=$id_usu;
    } 
    function setNombre($nombre){
      $this->nombre=$nombre;
    }
    function setnombre_usu($nombre_usuario){
      $this->nombre_usuario=$nombre_usuario;
    }
    function setEmail($email){
      $this->email = $email;
    }

    function setpass_usu($pass_usu){
      $this->pass_usu = $pass_usu;
    }

    function setTipo_usu($tipo_usuario){
      $this->tipo_usuario = $tipo_usuario;
    }
    

    public function altaUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "INSERT INTO usuarios VALUES('$this->email', '$this->pass_usu', '$this->tipo_usuario','$this->id_usu','$this->nombre','$this->nombre_usuario')";
      
      $dev = true;
      try{
        $conexion->query($sql);
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public function buscarUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT email FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['email'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public function buscarPass_usu(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT pass_usu FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['pass_usu'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public function buscarTipo_usuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT tipo_usuario FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['tipo_usuario'];
     
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
    public function buscarNombre(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT nombre FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['nombre'];
     
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
    public function buscarNombre_usuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT nombre_usuario FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['nombre_usuario'];
     
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
    public function buscarDNI(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT id_usu FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['id_usu'];
     
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
    public function modificarDNI(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "UPDATE usuarios
			        SET id_usu='$this->id_usu',
                  nombre_usuario='$this->nombre_usuario',
                  nombre='$this->nombre',
                  email='$this->email',
                  pass_usu='$this->pass'
			        WHERE email = '$this->email'";
      $res = $conexion->query($sql);
      $res->free();
      Conexion::desconectarBD($conexion);
     
    }
    public function modificarUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "UPDATE usuarios
			        SET id_usu='$this->id_usu',
                  nombre_usuario='$this->nombre_usuario',
                  nombre='$this->nombre'
                  email='$this->email'
                  pass_usu='$this->pass'
			        WHERE email = '$this->email'";
      $res = $conexion->query($sql);
      $res->free();
      Conexion::desconectarBD($conexion);
     
    }
  }
 
?>
