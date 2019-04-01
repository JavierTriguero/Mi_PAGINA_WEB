<?php
  class Usuario{

    private $email;
    private $pass;
    private $tipo;

    function __construct($email, $pass){
      $this->email = $email;
      $this->pass = $pass;
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
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "INSERT INTO usuarios VALUES('$this->email', '$this->pass', 'usuario')";
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
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
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
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT pas FROM usuarios WHERE email='$this->email'";
      $res = $conexion->query($sql);
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc()['pas'];
      }else{
        $dev = false;
      }
      $res->free();
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public function buscarTipoUsuario(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
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