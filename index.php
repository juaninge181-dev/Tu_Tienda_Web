<?php
/*
 * Archivo de control principal - Punto de entrada
 * Autor: Juan Luis Martínez Rivero
 * Descripción: Gestiona el acceso de los usuarios según su rol.
 */

session_start();

// Validamos si ya existe una sesión activa
if (isset($_SESSION['id_usuario'])) {
    
    // Verificamos el rol del usuario para redirigirlo a su panel correspondiente
    $rol = $_SESSION['rol'];
    
    if ($rol === 'vendedor') {
        header("Location: views/dashboard_vendedor.php");
    } else {
        header("Location: views/dashboard_comprador.php");
    }
    
    exit(); // Finalizamos el script después de la redirección
}

// Si no hay sesión, mandamos al usuario a iniciar sesión
header("Location: views/login.php");
exit();
?>