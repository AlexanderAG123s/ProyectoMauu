<?php 

    include_once("../modelo/Question.php");

    $question = new Question();
    
    if ($_POST['funcion'] == 'crear_pregunta') {
        $pregunta = $_POST['question'];
        $answer_1 = $_POST['answer_1'];
        $answer_2 = $_POST['answer_2'];
        $answer_c = $_POST['answer_c'];
        $tema_p = $_POST['tema'];
        $asignatura = $_POST['asignatura'];
        $question->crear_pregunta($pregunta, $answer_1, $answer_2, $answer_c, $asignatura, $tema_p);
    }
    if($_POST['funcion']  == 'rellenar_tema') {
        $question->rellenar_tema();
        $json = array();
        foreach ($question -> objetos as $objeto) {
            $json[]=array(
                'id'=>$objeto->id,
                'titulo' =>$objeto->titulo,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }


    if($_POST['funcion']  == 'rellenar_asignaturas') {
        $question->rellenar_asignaturas();
        $json = array();
        foreach ($question -> objetos as $objeto) {
            $json[]=array(
                'id'=>$objeto->id,
                'nombre' =>$objeto->nombre,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }



    if($_POST['funcion']  == 'mostrar_preguntas') {
        $question->mostrar_preguntas();
        $json = array();
        foreach($question-> objetos as $objeto) {
            $json[]=array(
                'id'=>$objeto->id,
                'question' =>$objeto->question,
                'respuesta_1' => $objeto->respuesta_f,
                'respuesta_2' => $objeto->respuesta_f2,
                'respuesta_c' => $objeto->respuesta_c,
                'tema' =>$objeto->nombre_tema,
                'asignatura' =>$objeto->nombre_asig
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    if ($_POST['funcion'] == 'capturar_pregunta') {
        $json = array();
        $id_pregunta = $_POST['id_pregunta'];
        $question->capturar_pregunta($id_pregunta);
        foreach ($question->objetos as $objeto) {
            $json[] = array(
                'id'=>$objeto->id,
                'question' =>$objeto->question,
                'respuesta_1' => $objeto->respuesta_f,
                'respuesta_2' => $objeto->respuesta_f2,
                'respuesta_c' => $objeto->respuesta_c,
                'tema' => $objeto->tema,
                'asignatura' => $objeto->asignatura,
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
    if($_POST['funcion'] == 'editar_pregunta') {
        $id_editado = $_POST['id_pregunta'];
        $pregunta = $_POST['question_e'];
        $respuesta_1 = $_POST['answer_f1_e'];
        $respuesta_2 = $_POST['answer_f2_e'];
        $respuesta_c = $_POST['answer_c_e'];
        $tema = $_POST['tema_e'];
        $asignatura = $_POST['asignatura_e'];
        $question->editar_pregunta($id_editado, $pregunta, $respuesta_1, $respuesta_2, $respuesta_c, $tema, $asignatura);
    }

    
?>