<?php 
include_once 'conexion.php';
    class Usuario {
        var $objetos;
        public function __construct() {
            $db = new Conexion(); 
            $this->acceso = $db->pdo;

        }
        function Loguearse ($clave, $pass) {
            $sql = "SELECT * FROM usuarios inner join tipos on tipo = id where clave = :clave and password = :pass";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':clave' => $clave, ':pass' => $pass));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        function crear_usuario($nombre, $clave, $estado, $pass, $tipo) {
            $sql = "SELECT id_usuario FROM usuarios where clave =:clave";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':clave' => $clave));
            $this->objetos=$query->fetchall();

            if(!empty($this->objetos)) {
                echo 'noadd';
            } else {
                $sql = "INSERT INTO usuarios (nombre, clave, password, estado, tipo) VALUES (:nombre, :clave, :pass, :estado, :tipo)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':nombre' => $nombre, ':clave' => $clave, ':estado' => $estado, ':pass' => $pass, ':tipo' =>$tipo));
                echo 'add';
            }
        }
        function buscar_usuario() {
            $sql = "SELECT usuarios.id_usuario, usuarios.Nombre, usuarios.Clave, usuarios.Estado, tipos.Descripcion as tipo_us FROM usuarios
            JOIN tipos on usuarios.Tipo = tipos.id";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        function rellenar_tipo() {
            $sql = "SELECT * FROM tipos order by descripcion asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        function capturar_usuario($id_usuario) {
            $sql = "SELECT * FROM usuarios WHERE id_usuario =:id_usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_usuario' => $id_usuario));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        function editar_usuario($id_usuario, $nombre, $clave, $pass, $tipo) {
            $sql = "UPDATE usuarios SET nombre = :nombre, clave = :clave, password = :pass, tipo = :tipo  where id_usuario = :id_usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_usuario' => $id_usuario, ':nombre' => $nombre, ':clave' => $clave, ':pass' => $pass, ':tipo' => $tipo));
            echo 'editado';
        }
        function eliminar_usuario($id_usuario, $activo) {
            $sql = "UPDATE usuarios SET estado = :estado WHERE id_usuario = :id_usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute(array( ':estado' => $activo ,':id_usuario' => $id_usuario));
            echo 'delete';
        }
        function habilitar($id_usuario, $activo) {
            $sql = "UPDATE usuarios SET estado = :estado WHERE id_usuario = :id_usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute(array( ':estado' => $activo ,':id_usuario' => $id_usuario));
            echo 'update';
        }
        function obtener_tipo ($clave, $pass) {
            $sql = "SELECT * FROM usuarios where clave = :clave and password = :pass";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':clave' => $clave, ':pass' => $pass));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }
?>