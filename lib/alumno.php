<?php
  class Alumno{

    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;

    function __construct($nombre, $apellido, $telefono, $email){
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->telefono = $telefono;
      $this->email = $email;
    }

    function getId(){
      if(isset($this->id)){
        return $this->id;
      }else{
        return NULL;
      }
    }

    function getNombre(){
      return $this->nombre;
    }

    function getApellido(){
      return $this->apellido;
    }

    function getTelefono(){
      return $this->telefono;
    }

    function getEmail(){
      return $this->email;
    }

    function setId($id){
      $this->id = $id;
    }

    function setNombre($nombre){
      $this->nombre = $nombre;
    }

    function setApellido($apellido){
      $this->apellido = $apellido;
    }

    function setTelefono($telefono){
      $this->telefono = $telefono;
    }

    function setEmail($email){
      $this->email = $email;
    }

    public static function totalAlumnos(){
      $total = 0;
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT * FROM alumnos";
      $res = $conexion->query($sql);
      while($res->fetch_assoc()){
        $total++;
      }
      Conexion::desconectarBD($conexion);
      $res->free();
      return $total;
    }

    public static function devolverAlumnosPaginacion($inicio){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT id, nombre, apellido FROM alumnos LIMIT " . $inicio . ", 4";
      $res = $conexion->query($sql);
      $alumnos = array();
      while($alumno = $res->fetch_assoc()){
        $alumnos[] = $alumno;
      }
      Conexion::desconectarBD($conexion);
      $res->free();
      return $alumnos;
    }

    public static function devolverAlumnoID($id){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT * FROM alumnos WHERE id='" . $id . "'";
      $res = $conexion->query($sql);
      $dev = NULL;
      if($res->num_rows > 0){
        $dev = $res->fetch_assoc();
      }
      Conexion::desconectarBD($conexion);
      $res->free();
      return $dev;
    }

    public static function modificarAlumno($id, $nombre, $apellido, $telefono, $email){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "UPDATE alumnos SET nombre='$nombre', apellido='$apellido', telefono='$telefono', email='$email' WHERE id='$id'";
      $dev = true;
      try{
        $conexion->query($sql);
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public static function altaFalta($id, $asignatura, $fecha){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "INSERT INTO faltas VALUES('$id', '$asignatura', '$fecha', NULL, 'F')";
      $dev = true;
      try{
        $conexion->query($sql);
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public static function bajaFalta($idFalta){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "DELETE FROM faltas WHERE id='$idFalta'";
      $dev = true;
      try{
        $conexion->query($sql);
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public static function altaAlumno($nombre, $apellido, $telefono, $email){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "INSERT INTO alumnos VALUES(NULL, '$nombre', '$apellido', '$telefono', '$email')";
      $dev = true;
      try{
        $conexion->query($sql);
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public static function eliminarAlumno($id){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "DELETE FROM alumnos WHERE id='$id'";
      $dev = true;
      try{
        $conexion->query($sql);
        $sql = "DELETE FROM faltas WHERE id_alumno='$id'";
        try{
          $conexion->query($sql);
        }catch(Exception $e){
          $dev = false;
        }
      }catch(Exception $e){
        $dev = false;
      }
      Conexion::desconectarBD($conexion);
      return $dev;
    }

    public static function faltasAlumno($id){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT * FROM faltas WHERE id_alumno='$id'";
      $res = $conexion->query($sql);
      $dev = array();
      while($falta = $res->fetch_assoc()){
        $dev[] = $falta;
      }
      Conexion::desconectarBD($conexion);
      $res->free();
      return $dev;
    }

    public static function devolverAlumnos(){
      $conexion = Conexion::conectarBD("localhost", "root", "", "navidad");
      $sql = "SELECT * FROM alumnos";
      $res = $conexion->query($sql);
      $alumnos = array();
      if($res->num_rows > 0){
        while($alumno = $res->fetch_assoc()){
          $alumnos[] = $alumno;
        }
      }
      Conexion::desconectarBD($conexion);
      $res->free();
      return $alumnos;
    }

  }
?>
