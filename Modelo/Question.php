<?php 
include_once 'conexion.php';
    class Question {
        var $objetos;
        public function __construct() {
            $db = new Conexion(); 
            $this->acceso = $db->pdo;
        }

        function crear_pregunta($pregunta, $answer_1, $answer_2, $answer_c, $asignatura, $tema_p) {
            $sql = "SELECT * FROM preguntas where question = :question";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':question' => $pregunta));
            $this->objetos=$query->fetchall();

            if(!empty($this->objetos)) {
                echo 'noadd';
            } else {
                $sql = "INSERT INTO preguntas (question, respuesta_f, respuesta_f2, respuesta_c ,tema, asignatura) VALUES (:question, :answer_1, :answer_2, :answer_c, :tema_p, :asignatura)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':question' => $pregunta, ':answer_1' => $answer_1, ':answer_2' => $answer_2, ':answer_c' => $answer_c, ':tema_p' => $tema_p, ':asignatura' => $asignatura));
                echo 'add';
            }
        }
        function rellenar_tema() {
            $sql = "SELECT * FROM temas order by titulo asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function rellenar_asignaturas() {
            $sql = "SELECT * FROM asignaturas order by nombre asc";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function mostrar_preguntas() {
            $sql = "SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.Titulo as nombre_tema, asignaturas.Nombre as nombre_asig
            FROM preguntas
            JOIN temas on preguntas.Tema = temas.id
            JOIN asignaturas on preguntas.asignatura = asignaturas.id";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }



        function capturar_pregunta($id_pregunta) {
            $sql = "SELECT * FROM preguntas WHERE id = :id_pregunta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_pregunta' => $id_pregunta));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

        function editar_pregunta($id_editado, $pregunta, $respuesta_1, $respuesta_2, $respuesta_c, $tema, $asignatura ){
            $sql = "UPDATE preguntas SET question = :question, respuesta_f = :respuesta_f, respuesta_f2 = :respuesta_f2, respuesta_c = :respuesta_c, tema = :tema_p, asignatura = :asignatura WHERE id = :id_editado";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_editado' => $id_editado, ':question' => $pregunta, ':respuesta_f' => $respuesta_1, ':respuesta_f2' => $respuesta_2, ':respuesta_c' => $respuesta_c, ':tema_p' => $tema, ':asignatura' => $asignatura));
            echo 'editado';
        }

        function generar_pdf() {
            $sql = "SELECT preguntas.id, preguntas.question, preguntas.respuesta_f, preguntas.respuesta_f2, preguntas.respuesta_c, temas.titulo as nombre_tema 
            FROM preguntas
            JOIN temas ON preguntas.tema = temas.id";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }

    }
?>