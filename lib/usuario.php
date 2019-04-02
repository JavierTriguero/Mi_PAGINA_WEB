<?php
  class Usuario{
    private $id_usu;
    private $email;
    private $pass_usu;
    private $tipo_usuario;
    private $nombre;
    private $nombre_usuario;


    function __construct($email,$pass_usu,$nombre,$nombre_usuario,$dni){
      $this->email = $email;
      $this->pass_usu = $pass_usu;
      $this->tipo_usu="";
      $this->nombre = $nombre;
      $this->nombre_usuario=$nombre_usuario;
      $this->id_usu=$dni;
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
      return $this->id;
    }
    function getNombre(){
      return $this->nombre;
    }
    function getnombre_usu(){
      return $this->nombre_usuario;
    }
     //Metodos para asignar los datos que quiera
    function setID($id_usu){
      $this->id=$id_usu;
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
      var_dump($sql);
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

    public function buscarpass_usu(){
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

    public function buscartipo_usuUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT tipo_usuUsr FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['tipo_usuUsr'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
  }
?>
