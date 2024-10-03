<?php
include_once("../modelo/Usuario.php");
$usuario = new Usuario();

if ($_POST['funcion'] == 'crear_usuario') {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $pass = $_POST['pass'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

    $usuario->crear_usuario($nombre, $clave, $estado, $pass, $tipo);
}

if($_POST['funcion']  == 'rellenar_tipo') {
    $usuario->rellenar_tipo();
    $json = array();
    foreach ($usuario -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre' =>$objeto->descripcion
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'buscar_usuario') {
    $usuario->buscar_usuario();
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id_usuario,
            'nombre' => $objeto->nombre,
            'clave' => $objeto->clave,
            'estado' => $objeto->estado,
            'us_tipo' => $objeto->tipo_us
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'capturar_usuario') {
    $json = array();
    $id_usuario = $_POST['id_usuario'];
    $usuario->capturar_usuario($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'nombre' => $objeto->nombre,
            'clave' => $objeto->clave,
            'estado' => $objeto->estado,
            'password' => $objeto->password,
            'us_tipo' => $objeto->tipo
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'editar_usuario') {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $pass = $_POST['pass'];
    $tipo = $_POST['tipo'];

    $usuario->editar_usuario($id_usuario,$nombre, $clave, $pass, $tipo);
}

if ($_POST['funcion'] == 'eliminar_usuario') {
    $id_usuario = $_POST['id'];
    $activo = 0;
    $usuario->eliminar_usuario($id_usuario, $activo);
}

if ($_POST['funcion'] == 'habilitar_usuario') {
    $id_usuario = $_POST['id'];
    $activo = 1;
    $usuario->habilitar($id_usuario, $activo);
}

if($_POST['funcion'] == 'obtener_tipo') {
    $json = array();
    $clave = $_POST['clave'];
    $pass = $_POST['pass'];
    $usuario->obtener_tipo($clave, $pass);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'us_tipo' => $objeto->tipo,
            'nombre' => $objeto->nombre,
            'estado' => $objeto->estado
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

}

?>