<?php 
include_once 'conexion.php';
    class Materia {
        var $objetos;
        public function __construct() {
            $db = new Conexion(); 
            $this->acceso = $db->pdo;
        }

        function crear_materia($nombre, $avatar, $estado) {

            $sql = "SELECT id FROM asignaturas where nombre = :nombre";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre' => $nombre));
            $this->objetos=$query->fetchall();

            if(!empty($this->objetos)) {
                echo 'noadd';
            } else {
                $sql = "INSERT INTO asignaturas (nombre, estado, icono) VALUES (:nombre, :estado, :icono)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':nombre' => $nombre, ':estado' => $estado, ':icono' => $avatar));
                echo 'add';
            }
        }

        function buscar() {
            $sql = "SELECT * FROM asignaturas";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }

        function editar_materia($nombre, $id_editado){
        $sql = "UPDATE asignaturas SET nombre =:nombre WHERE id = :id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id' => $id_editado, ':nombre' => $nombre));
        $this->objetos = $query->fetchall();
        echo 'editado';
        return $this->objetos;
    }

    function capturar_materia($id_materia) {
        $sql = "SELECT * FROM asignaturas WHERE id = :id_materia";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_materia' => $id_materia));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function cambiar_logo($id, $nombre){
        $sql = "SELECT icono FROM asignaturas where id=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=> $id));
        $this->objetos = $query->fetchall();
        
        
        
        if(!empty($this->objetos)) {
            $sql = "UPDATE asignaturas SET icono=:nombre where id=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id' => $id, ':nombre' =>$nombre));
            return $this->objetos;
        }
}

    function deshabilitar_materia($id_materia){
        $sql = "UPDATE asignaturas SET estado = 1 WHERE id = :id_materia";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_materia' => $id_materia));
        echo 'inhabilitado';
    }

    function habilitar_materia($id_materia) {
        $sql = "UPDATE asignaturas SET estado = 0 WHERE id = :id_materia";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_materia' => $id_materia));
        echo 'habilitado';
    }
        

}