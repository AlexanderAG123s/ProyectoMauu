<?php
require_once '../modelo/Usuario.php';

session_start();
$usuario = new Usuario();

if (isset($_POST['funcion']) && $_POST['funcion'] == 'Loguearse') {
    $clave = $_POST['clave'];
    $pass = $_POST['pass'];
        $usuario->Loguearse($clave, $pass);
        if (!empty($usuario->objetos)) {
            foreach($usuario -> objetos as $objeto) {
                $_SESSION['usuario'] =$objeto -> id_usuario;
                $_SESSION['us_tipo'] =$objeto -> tipo;
                $_SESSION['nombre'] =$objeto -> nombre;
                $_SESSION['estado'] = $objeto-> estado;
                
            }
            echo 'login';
        } else {
            echo 'nosesion';
        }
    }

?>