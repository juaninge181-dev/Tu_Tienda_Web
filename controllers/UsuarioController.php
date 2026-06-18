<?php
// controllers/UsuarioController.php

session_start();

require_once '../config/conexion.php';
require_once '../models/Usuario.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

// --- ACCIÓN DE CERRAR SESIÓN (MÉTODO GET) ---
if ($action == 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}

// --- ACCIONES DE FORMULARIOS (MÉTODO POST) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $database = new Database();
    $db = $database->getConnection();
    $usuario = new Usuario($db);

    // Acción de Registro
    if ($action == 'registrar') {
        $usuario->nombre = $_POST['nombre'];
        $usuario->correo = $_POST['correo'];
        $usuario->password = $_POST['contrasena']; // Cambiado a 'contrasena' para coincidir con la vista
        $usuario->rol = $_POST['rol'];
        
        if ($usuario->registrar()) {
            header("Location: ../views/login.php?registro=exitoso");
            exit();
        } else {
            header("Location: ../views/registro.php?error=registro_fallido");
            exit();
        }
    }
    
    // Acción de Login
    if ($action == 'login') {
        $usuario->correo = $_POST['correo'];
        $password_ingresada = $_POST['contrasena']; // Cambiado a 'contrasena' para coincidir con el formulario corregido
        
        $datos_usuario = $usuario->loginPorCorreo();
        
        if ($datos_usuario) {
            if (password_verify($password_ingresada, $datos_usuario['password'])) {
                
                // Guardar datos en la sesión
                $_SESSION['id_usuario'] = $datos_usuario['id_usuario'];
                $_SESSION['nombre'] = $datos_usuario['nombre'];
                $_SESSION['rol'] = $datos_usuario['rol'];
                
                // REDIRECCIÓN SEGÚN EL ROL DEL USUARIO
                if ($_SESSION['rol'] == 'vendedor') {
                    header("Location: ../views/dashboard_vendedor.php");
                } else {
                    header("Location: ../views/dashboard_comprador.php");
                }
                exit();
                
            } else {
                // Redirige al login indicando error de contraseña
                header("Location: ../views/login.php?error=password");
                exit();
            }
        } else {
            // Redirige al login indicando que el correo no existe
            header("Location: ../views/login.php?error=user_not_found");
            exit();
        }
    }
}
?>