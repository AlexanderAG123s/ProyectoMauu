<?php 
include_once 'conexion.php';
    class Temario {
        var $objetos;
        public function __construct() {
            $db = new Conexion(); 
            $this->acceso = $db->pdo;
        }

        function crear_tema($titulo, $materia, $parcial, $semestre) {
            $sql = "SELECT id FROM temas where titulo = :titulo";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':titulo' => $titulo));
            $this->objetos=$query->fetchall();
        
            if(!empty($this->objetos)) {
                echo 'noadd';
            } else {
                $sql = "INSERT INTO temas (titulo, asignatura, parcial, semestre) VALUES (:titulo, :materia, :parcial, :semestre)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':titulo' => $titulo, ':materia' => $materia, ':parcial' => $parcial, ':semestre' => $semestre));
                echo 'add';
            }
        }

        function rellenar_tema() {
            $sql = "SELECT * FROM asignaturas order by id asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function rellenar_parcial() {
            $sql = "SELECT * FROM parciales order by descripcion asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function mostrar_temas() {
            $sql = "SELECT temas.id, temas.Titulo, asignaturas.Nombre as nombre_asig, parciales.Descripcion as nombre_parcial, semestres.Descripcion as nombre_semestre
            FROM temas
            JOIN asignaturas on temas.Asignatura = asignaturas.id
            JOIN parciales on temas.Parcial = parciales.id 
            JOIN semestres on temas.semestre = semestres.id order by id asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        function rellenar_semestre() {
            $sql = "SELECT * FROM semestres order by descripcion asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
        function editar_tema($titulo, $materia, $parcial, $id_editado, $semestre){
            $sql = "UPDATE temas SET titulo = :titulo, asignatura = :asignatura, parcial = :parcial, semestre = :semestre WHERE id = :id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id' => $id_editado, ':titulo' => $titulo, ':asignatura' => $materia, ':parcial' => $parcial, ':semestre' => $semestre));
            echo 'editado';
        }

        function capturar_tema($id_tema) {
            $sql = "SELECT * FROM temas WHERE id = :id_tema";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_tema' => $id_tema));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function deshabilitar_tema($id_tema){
            $sql = "UPDATE temas SET activo = 1 WHERE id = :id_tema";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_tema' => $id_tema));
            echo 'inhabilitado';
        }

        function habilitar_tema($id_tema){
            $sql = "UPDATE temas SET activo = 0 WHERE id = :id_tema";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_tema' => $id_tema));
            echo 'habilitado';
        }

}