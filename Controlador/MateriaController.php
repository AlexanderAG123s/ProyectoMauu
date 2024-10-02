<?php
include_once("../modelo/Materia.php");
$materia = new Materia();


if ($_POST['funcion'] == 'crear_materia') {
    $nombre = $_POST['nombre'];
    $avatar = 'DefaultProfile.png';
    $estado = 0;
    $materia->crear_materia($nombre, $avatar, $estado);
}

if($_POST['funcion'] == 'mostrar_materias') {
    $materia -> buscar();
    $json=array();
    foreach ($materia -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'nombre' =>$objeto->nombre,
            'avatar' => '../img/Materias/'.$objeto->icono,
            'activo' => $objeto->estado
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion'] == 'editar_materia') {
    $nombre = $_POST['nombre'];
    $id_editado = $_POST['id_materia'];
    $materia->editar_materia($nombre, $id_editado);
}

if ($_POST['funcion'] == 'capturar_materia') {
    $json = array();
    $id_materia = $_POST['id_materia'];
    $materia->capturar_materia($id_materia);
    foreach ($materia->objetos as $objeto) {
        $json[] = array(
            'nombre' => $objeto->nombre
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if($_POST['funcion'] == 'cambiar_logo') {
    $id = $_POST['id_logo_mat'];
    if(($_FILES['photo']['type'] == 'image/jpeg')||($_FILES['photo']['type'] == 'image/png')||($_FILES['photo']['type'] == 'image/gif')){
        $nombre=uniqid().'-'. $_FILES['photo']['name'];
        $ruta='../img/Materias/'.$nombre;
        move_uploaded_file($_FILES['photo']['tmp_name'], $ruta);
        $materia -> cambiar_logo($id, $nombre);
            $json = array();
            $json[] =array(
                'ruta'=>$ruta,
                'alert' =>'edit'
            );
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }   
        else {
            $json= array();
            $json[]=array(
                'alert' =>'noedit'
            );
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }
}

if ($_POST['funcion'] == 'deshabilitar_materia') {
    $id_materia = $_POST['id_materia'];
    $materia->deshabilitar_materia($id_materia);
}
if ($_POST['funcion'] == 'habilitar_materia') {
    $id_materia = $_POST['id_materia'];
    $materia->habilitar_materia($id_materia);
}
