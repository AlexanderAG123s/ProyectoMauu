<?php 
include_once 'conexion.php';
    class Examen {
        var $objetos;
        public function __construct() {
            $db = new Conexion(); 
            $this->acceso = $db->pdo;
        }

        function rellenar_check() {
            if(!empty($_POST['consulta'] || !empty($_POST['parcial']))) {
                $consulta=$_POST['consulta'];
                $parcial=$_POST['parcial'];
                $sql= "SELECT * FROM temas where asignatura LIKE :consulta and parcial LIKE :parcial";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':consulta' =>"%$consulta%", ':parcial' => "%$parcial%"));
                $this->objetos=$query->fetchall();
                return $this->objetos;
            } else {
                    $sql="SELECT * FROM temas where asignatura NOT LIKE '' ORDER BY id LIMIT 25";
                    $query = $this->acceso->prepare($sql);
                    $query->execute();
                    $this->objetos=$query->fetchall();
                    return $this->objetos;
            }
        }
        function generar_pdf() {
            if(!empty($_POST['consulta'])) {
                $consulta=$_POST['consulta'];
                $checkedDataIds=$_POST['checkedDataIds'];
                $parcial = $_POST['parcial'];
                $sql= "SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.titulo as nombre_tema 
                FROM preguntas
                JOIN temas ON preguntas.tema = temas.id
                WHERE temas.asignatura LIKE :consulta AND temas.parcial LIKE :parcial AND temas.id IN :temas
                ORDER BY RAND()
                LIMIT 25"; // adjust the limit to the desired number of random preguntas
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':consulta' => "%$consulta%", ':parcial' => "%$parcial%", ':temas' => implode(',', $checkedDataIds)));
                $this->objetos=$query->fetchall();
                return $this->objetos;
            } else {
                $sql="SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.titulo as nombre_tema 
                FROM preguntas
                JOIN temas ON preguntas.tema = temas.id where temas.titulo NOT LIKE '' ORDER BY id LIMIT 25";
                $query = $this->acceso->prepare($sql);
                $query->execute();
                $this->objetos=$query->fetchall();
                return $this->objetos;
            }
        }

        function generar_pdf_r() {
            if(!empty($_POST['consulta'])) {
                $consulta=$_POST['consulta'];
                $sql= "SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.titulo as nombre_tema 
                        FROM preguntas
                        JOIN temas ON preguntas.tema = temas.id
                        WHERE temas.asignatura LIKE :consulta
                        ORDER BY RAND()
                        LIMIT 25"; // adjust the limit to the desired number of random preguntas
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':consulta' =>"%$consulta%"));
                $this->objetos=$query->fetchall();
                return $this->objetos;
            } else {
                $sql="SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.titulo as nombre_tema 
                FROM preguntas
                JOIN temas ON preguntas.tema = temas.id where temas.titulo NOT LIKE '' ORDER BY id LIMIT 25";
                $query = $this->acceso->prepare($sql);
                $query->execute();
                $this->objetos=$query->fetchall();
                return $this->objetos;
            }
        }

        function rellenar_parcial_r() {
            if(!empty($_POST['consulta'])) {
                $consulta=$_POST['consulta'];
                $parcial=$_POST['parcial'];
                $sql= "SELECT * FROM temas where asignatura LIKE :consulta and parcial LIKE :parcial";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':consulta' =>"%$consulta%", ':parcial' => "%$parcial%"));
                $this->objetos=$query->fetchall();
                return $this->objetos;
            }
        }
    }
