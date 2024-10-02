<?php
include_once("../modelo/Temario.php");
$temario = new Temario();

if ($_POST['funcion'] == 'crear_tema') {
    $titulo = $_POST['titulo'];
    $materia = $_POST['materia'];
    $parcial = $_POST['parcial'];
    $semestre = $_POST['semestre'];
    $temario->crear_tema($titulo, $parcial, $materia, $semestre);
}

if($_POST['funcion']  == 'rellenar_parcial') {
    $temario->rellenar_parcial();
    $json = array();
    foreach ($temario -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'descripcion' =>$objeto->descripcion
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']  == 'rellenar_materia') {
    $temario->rellenar_tema();
    $json = array();
    foreach ($temario -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre' =>$objeto->nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']  == 'rellenar_semestre') {
    $temario->rellenar_semestre();
    $json = array();
    foreach ($temario -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'descripcion' =>$objeto->descripcion
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']  == 'mostrar_temas') {
    $temario->mostrar_temas();
    $json = array();
    foreach($temario-> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'titulo' =>$objeto->titulo,
            'materia' =>$objeto->nombre_asig,
            'parcial' =>$objeto->nombre_parcial,
            'semestre' => $objeto->nombre_semestre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion'] == 'editar_tema') {
    $titulo = $_POST['titulo'];
    $materia = $_POST['materia'];
    $parcial = $_POST['parcial'];
    $id_editado = $_POST['id_tema'];
    $semestre = $_POST['semestre'];
    $temario->editar_tema($titulo, $materia, $parcial, $id_editado, $semestre);
}
if ($_POST['funcion'] == 'capturar_tema') {
    $json = array();
    $id_tema = $_POST['id_tema'];
    $temario->capturar_tema($id_tema);
    foreach ($temario->objetos as $objeto) {
        $json[] = array(
            'titulo' => $objeto->titulo,
            'materia' => $objeto->asignatura,
            'parcial' => $objeto->parcial,
            'semestre' => $objeto->semestre
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'deshabilitar_tema') {
    $id_tema = $_POST['id_tema'];
    $temario->deshabilitar_tema($id_tema);
}

if ($_POST['funcion'] == 'habilitar_tema') {
    $id_tema = $_POST['id_tema'];
    $temario->habilitar_tema($id_tema);
}