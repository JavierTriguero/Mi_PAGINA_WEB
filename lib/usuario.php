<?php
  class Usuario{
    private $id;
    private $email;
    private $pass;
    private $tipo;
    private $nombre;
    private $nombre_usuario;
    

    function __construct($email, $pass){
      $this->email = $email;
      $this->pass = $pass;
    }
    function getID(){
      return $this->id;
    }
    function getEmail(){
      return $this->email;
    }

    function getPass(){
      return $this->pass;
    }

    function getTipo(){
      return $this->tipo;
    }
    function setID(){
      $this->id=$id;
    }
    function setEmail($email){
      $this->email = $email;
    }

    function setPass($pass){
      $this->pass = $pass;
    }

    function setTipo($tipo){
      $this->tipo = $tipo;
    }

    public function altaUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "INSERT INTO usuarios VALUES('$this->email', '$this->pass', 'usuario','$this->id')";
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

    public function buscarPass(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT pass FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['pass'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public function buscarTipoUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "pollosrufino");
      $sql = "SELECT tipoUsr FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['tipoUsr'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }
  }
?>
